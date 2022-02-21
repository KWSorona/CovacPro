from urllib.request import urlopen
from bs4 import BeautifulSoup
from datetime import datetime
from urllib.parse import quote_plus
import pymysql

# 나라별 / 8시간 / 완료

print("==========================DB 시작====================================")
conn = pymysql.connect(host="covac-database.cr30zu6nndkq.ap-northeast-2.rds.amazonaws.com", user="redo", password="memento!", db="covac", port=3306, charset='utf8', autocommit=True)
curs = conn.cursor(pymysql.cursors.DictCursor)

def crawls():
    now = datetime.now()
    print("==========================크롤 시작====================================")
    nationalVaccine = "https://www.bbc.com/korean/features-56066227"
    url = nationalVaccine
    html = urlopen(url)
    bsObject = BeautifulSoup(html, "html.parser")

    articles = bsObject.find_all('div',{'class' : 'doses-component'})
    print("%s년 %s월 %s일 %s시 %s분" % (now.year, now.month, now.day, now.hour, now.minute) + ' 기준')

    a = []
    num = 0
    for ar in articles:
        status = ar.select_one('div.value').text
        national_kind = ['중국', '미국', '인도', '브라질', '영국', '독일']
        if num != 0:
            if num <= 6:
                print(national_kind[num-1] + '나라 접종현황:' + status)
                asd = num - 1
                a.append(float(status))
        num += 1
    print(a)
    total = sum(a)

# list에 넣고 밑에서 그 값들 다 더해서 현재값 / 총합 * 100 연산처리해서 update 하기.
    num = 0
    for ar in articles:
        status = ar.select_one('div.value').text
        national_kind = ['중국', '미국', '인도', '브라질', '영국', '독일']
        if num != 0:
            if num <= 6:
                status = float(status)
                # print(national_kind[num-1] + '나라 접종현황:' + status)
                status = status / total * 100
                status = round(status, 1)
                sql = "UPDATE National SET count = %s WHERE national = %s"
                curs.execute(sql, (status, national_kind[num-1]))
                conn.commit
                print(status)
                print("db 연동 완료")
        num += 1

crawls()
conn.close