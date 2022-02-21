import urllib.request 
import json 
import pandas as pd
import numpy as np
from pandas.io.json import json_normalize 
from datetime import date, datetime
import pymysql

now = datetime.now()
nowDate = now.strftime('%Y.%m')

# 서울 / 8시간 / 완료

print("==========================DB 시작====================================")
conn = pymysql.connect(host="covac-database.cr30zu6nndkq.ap-northeast-2.rds.amazonaws.com", user="redo", password="memento!", db="covac", port=3306, charset='utf8', autocommit=True)
curs = conn.cursor(pymysql.cursors.DictCursor)

def seoul():
    now = datetime.now()
    print("%s년 %s월 %s일 %s시 %s분" % (now.year, now.month, now.day, now.hour, now.minute) + ' 기준')

    url = "http://openapi.seoul.go.kr:8088/79497a58597967683939544c594358/json/tvCorona19VaccinestatNew/1/50"
    response = urllib.request.urlopen(url) 
    json_str = response.read().decode("utf-8")
    json_object = json.loads(json_str)
    df = pd.json_normalize(json_object['tvCorona19VaccinestatNew']['row'])

    print(df)
    date_list = df['S_VC_DT'].tolist() #날짜
    print(date_list)
    print("=====================================")

    humans_number = df['FIR_INC1'].tolist()
    print(humans_number)
    print("======================================================")
        
    #INSERT INTO / ON DUPLICATE KEY UPDATE 로 날짜 넣고 있으면 업데이트, 없으면 데이터 삽입/ 날짜에 맞게 순서대로 데이터 삽입
    num = 0
    ss= 0

    for i in date_list:
        sql = "INSERT INTO Seoul VALUES (%s, %s) ON DUPLICATE KEY UPDATE date =%s, human = %s"
        curs.execute(sql, (date_list[num], humans_number[num], date_list[num], humans_number[num]))
        print(humans_number[num], date_list[num])
        conn.commit
        print("db 연동 완료")

        if str(date_list[num]).split(".")[1] == "06":
            ss += int(humans_number[num])
            print(ss)

        num += 1

    sql = "INSERT INTO Seoul_sum (date, sum) VALUES (%s, %s) ON DUPLICATE KEY UPDATE sum=%s"
    curs.execute(sql, (nowDate, ss, ss))
    conn.commit
    print("6월별 합 db 연동 완료")   

seoul()
conn.close