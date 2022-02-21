from urllib.request import urlopen
from bs4 import BeautifulSoup
from datetime import datetime
from urllib.parse import quote_plus
import pymysql

# 언론사별 / 8시간 / 완료

print("==========================DB 시작====================================")
conn = pymysql.connect(host="covac-database.cr30zu6nndkq.ap-northeast-2.rds.amazonaws.com", user="redo", password="memento!", db="covac", port=3306, charset='utf8', autocommit=True)
curs = conn.cursor(pymysql.cursors.DictCursor)

def crawls():
    now = datetime.now()
    print("==========================크롤 시작====================================")
    # 네이버 검색 기사
    naverNews = "https://search.naver.com/search.naver?where=news&sm=tab_jum&query="
    keyword = "코로나 백신"
    url = naverNews + quote_plus(keyword)
    html = urlopen(url)
    bsObject = BeautifulSoup(html, "html.parser")
    # img = bsObject.find_all(class_='thumb api_get', limit = 10)

    x = 0

    # 네이버 기사 컨테이너 수집
    # 네이버 기사 컨테이너 선택자: ul.list_news > li
    articles = bsObject.select('ul.list_news > li')
    print("%s년 %s월 %s일 %s시 %s분" % (now.year, now.month, now.day, now.hour, now.minute) + ' 기준')
    a = 1
    # num = 0

    for ar in articles:
        firstTitle = ar.select_one('a.news_tit').text # 기사 제목
        firstSource = ar.select_one('a.info.press').text # 기사 언론사
        firstURL = ar.select_one('div.news_area > a')['href'] # 기사 URL
        firstImageURL = ar.select_one('div > a > img')['src'] # 기사 이미지 URL

        x += 1
        # 특정 언론사 버튼을 클릭 시.

        # if not "연합뉴스" in firstSource:
        #     continue
        print('기사 제목:' + firstTitle, '\n' '언론사:' + firstSource + '\n' 'URL:' + firstURL + '\n' '이미지:' + firstImageURL)
        
        sql = "INSERT INTO News_Cl (title, press, img, url, alt) VALUES (%s, %s, %s, %s, %s)"
        curs.execute(sql, (firstTitle, firstSource, firstImageURL, firstURL, "asdasd"))
        conn.commit
        print(a)
        # num += 1
        print("db 연동 완료")

       
crawls()
conn.close

