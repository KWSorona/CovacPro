from urllib.request import urlopen
from bs4 import BeautifulSoup
from datetime import datetime
from urllib.parse import quote_plus
import pymysql

# 화이자 키워드 / 8시간 / 완료

print("==========================DB 시작====================================")
conn = pymysql.connect(host="covac-database.cr30zu6nndkq.ap-northeast-2.rds.amazonaws.com", user="redo", password="memento!", db="covac", port=3306, charset='utf8', autocommit=True)
curs = conn.cursor(pymysql.cursors.DictCursor)

def crawls():
    now = datetime.now()
    print("==========================크롤 시작====================================")
    # 네이버 검색 기사
    naverNews = "https://search.naver.com/search.naver?where=news&sm=tab_jum&query="
    keyword = "화이자"
    url = naverNews + quote_plus(keyword)
    html = urlopen(url)
    bsObject = BeautifulSoup(html, "html.parser")

    x = 0

    # 네이버 기사 컨테이너 수집
    # 네이버 기사 컨테이너 선택자: ul.list_news > li
    articles = bsObject.select('ul.list_news > li')
    print("%s년 %s월 %s일 %s시 %s분" % (now.year, now.month, now.day, now.hour, now.minute) + ' 기준')
    a = 1

    for ar in articles:
        firstTitle = ar.select_one('a.news_tit').text # 기사 제목
        firstSource = "화이자"
        # firstSource = ar.select_one('a.info.press').text # 기사 언론사
        firstURL = ar.select_one('div.news_area > a')['href'] # 기사 URL
        firstImageURL = ar.select_one('div > a > img')['src'] # 기사 이미지 URL

        x += 1

        print('기사 제목:' + firstTitle, '\n' 'URL:' + firstURL + '\n' '이미지:' + firstImageURL)
        
        sql = "INSERT INTO Vac_Cl (title, vac, img, url, alt) VALUES (%s, %s, %s, %s, %s)"
        curs.execute(sql, (firstTitle, firstSource, firstImageURL, firstURL, "asdasd"))
        conn.commit
        print(a)
        print("db 연동 완료")

crawls()
conn.close