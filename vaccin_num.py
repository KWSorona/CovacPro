from urllib.request import urlopen
from bs4 import BeautifulSoup
from datetime import datetime
import pymysql

# 백신접종 현황 표 + 지도/ 24시간마다 / 완료

now = datetime.now()
nowDate = now.strftime('%Y-%m-%d')
print(nowDate)      # 2021-06-06

print("==========================DB 시작====================================")
conn = pymysql.connect(host="covac-database.cr30zu6nndkq.ap-northeast-2.rds.amazonaws.com", user="redo", password="memento!", db="covac", port=3306, charset='utf8', autocommit=True)
curs = conn.cursor(pymysql.cursors.DictCursor)

def vaccin_crawls():
    print("==============================================================")
    # 코로나19 백신 페이지
    url = "https://ncv.kdca.go.kr/mainStatus.es?mid=a11702000000"
    html = urlopen(url)
    bsObject = BeautifulSoup(html, "html.parser")
    print("%s년 %s월 %s일 %s시 %s분" % (now.year, now.month, now.day, now.hour, now.minute) + '에 크롤링 시작')

    # 백신 접종현황 컨테이너 수집
    # 백신 접종현황 기준 시간 선택자: span.t_date
    vaccin_currentTime = bsObject.select_one('span.t_date').text
    print('백신 기준 일자:' + vaccin_currentTime)
 
    # 당일 누적 A+B 1회차 접종
    first_first = bsObject.find_all('td', class_='d_num')[0].text
    print('백신 당일 누적 A+B: 1회차: ' + first_first)

    # 당일 누적 A+B 2회차 접종
    first_second = bsObject.find_all('td', class_='d_num')[1].text
    print('백신 당일 누적 A+B: 2회차: ' + first_second)

    # 당일 실적 A 1회차 접종
    second_first = bsObject.find_all('td', class_='d_num')[2].text
    print('백신 당일 실적 A 1회차: ' + second_first)

    # 당일 실적 A 2회차 접종
    second_second = bsObject.find_all('td', class_='d_num')[3].text
    print('백신 당일 실적 A 2회차: ' + second_second)

    # 전일 누적 B 1회차 접종
    third_first = bsObject.find_all('td', class_='d_num')[4].text
    print('백신 전일 누적 B 1회차: ' + third_first)

    # 전일 누적 B 2회차 접종
    third_second = bsObject.find_all('td', class_='d_num')[5].text
    print('백신 전일 누적 B 2회차: ' + third_second)

    num = 0
    sql = "UPDATE Vac_com SET num = %s, standard = %s, f1 = %s, f2 = %s, f3 = %s, f4 = %s, f5 = %s, f6 = %s WHERE num='0'"
    curs.execute(sql, (num, vaccin_currentTime, first_first, first_second, second_first, second_second, third_first, third_second))
    conn.commit
    print("db 연동 완료")
    
def arena_crawls():
    print("==============================================================")
    # 코로나19 백신 페이지
    url = "https://ncv.kdca.go.kr/mainStatus.es?mid=a11702000000"
    html = urlopen(url)
    bsObject = BeautifulSoup(html, "html.parser")
    print("%s년 %s월 %s일 %s시 %s분" % (now.year, now.month, now.day, now.hour, now.minute) + '에 크롤링 시작')

    # 백신 시도별 접종현황 컨테이너 수집
    # 백신 시도별 접종현황 기준 시간 선택자: td.ta_r

    korea_sum = 0
    arena_kind = ['서울', '부산', '대구', '인천', '광주', '대전', '울산', '세종', '경기도', '강원도', '충북', '충남', '전북', '전남', '경북', '경남', '제주도']
    for z in range(1, 66):
        c = z % 4 == 1
        if c:
            vaccin_arena = bsObject.find_all('td', class_='ta_r')[z-1].text
            for x in arena_kind:
                print(x + '지역: ' + vaccin_arena)
                sql = "UPDATE Covac_status SET human = %s WHERE region = %s"
                curs.execute(sql, (vaccin_arena, x))
                conn.commit
                numString = vaccin_arena.replace(',','')
                korea_sum += int(numString)
                del arena_kind[0]
                break

    num = 0
    print("db 연동 완료")
    print(korea_sum)
    str(korea_sum)
    sql = "INSERT INTO Korea VALUES (%s, %s) ON DUPLICATE KEY UPDATE date = %s, human = %s"
    curs.execute(sql, (nowDate, korea_sum, nowDate, korea_sum))
    conn.commit
    print("하단 db 연동 완료")

    sql = "UPDATE Korea_sum SET sum = sum + %s WHERE date='2021.06'"
    curs.execute(sql, (korea_sum))
    conn.commit
    print("전국 sum db 연동 완료")


vaccin_crawls()
arena_crawls()
conn.close