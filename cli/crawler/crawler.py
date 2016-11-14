#! /usr/bin/env python
import requests
from bs4 import BeautifulSoup


def teach_login(s, uname, passwd):
    data = {
        "username": uname,
        "password": passwd,
        "usertype": "student",
        "btnlogon.x": "27",
        "btnlogon.y": "37",
    }
    s.post("http://seam.ustb.edu.cn:8080/jwgl/Login", data)


def teach_classtable(s):
    resp = s.get("http://seam.ustb.edu.cn:8080/jwgl/index.jsp")

    bsObj = BeautifulSoup(resp.content.decode('gbk'))
    table = bsObj.find('table', {"class": "classtable"}).tbody
    # print table
    return str(table)


def teach_scores(s):
    data = {
        "XNXQ": "all",
        "Submit": ""
    }
    resp = s.post("http://seam.ustb.edu.cn:8080/jwgl/score.jsp?stu=41357009", data)
    bsObj = BeautifulSoup(resp.content.decode('gbk'))
    tbody = bsObj.find('div', {"id": "maincontent"}).table.tr.tbody
    return str(tbody)


def teach_innovative_score1(s):
    resp = s.get("http://seam.ustb.edu.cn:8080/jwgl/score.jsp")
    bsObj = BeautifulSoup(resp.content.decode('gbk'))
    trs = bsObj.find('div', {"id": "maincontent"}).table.tbody.tr.td.table.tbody.children
    i = 0
    for tr in trs:
        if i == 6:
            return str(tr.td.table.tbody)
        i += 1
    return ""


def teach_innovative_score2(s):
    resp = s.get("http://seam.ustb.edu.cn:8080/jwgl/score.jsp")
    bsObj = BeautifulSoup(resp.content.decode('gbk'))
    trs = bsObj.find('div', {"id": "maincontent"}).table.tbody.tr.td.table.tbody.children
    i = 0
    for tr in trs:
        if i == 8:
            return str(tr.td.table.tbody)
        i += 1
    return ""


def lib_borrowed_books(uname, passwd):
    s = requests.session()
    s.get("http://lib.ustb.edu.cn:8080/reader/login.php")
    s.get("http://lib.ustb.edu.cn:8080/reader/captcha.php?code=1")
    data = {
        "number": uname,
        "passwd": passwd,
        "captcha": "1",
        "select": "cert_no",
        "returnUrl": ""
    }
    s.post("http://lib.ustb.edu.cn:8080/reader/redr_verify.php", data)
    resp = s.get("http://lib.ustb.edu.cn:8080/reader/book_lst.php")
    bsObj = BeautifulSoup(resp.content)
    trs = bsObj.find("table", {"class": "table_line"}).tbody.find_all("tr")
    retStr = "<tbody>"
    for tr in trs:
        i = 0
        retStr += "<tr>"
        for td in tr.find_all("td"):
            if i < 4:
                retStr += str(td)
            i += 1
        retStr += "</tr>"
    retStr += "</tbody>"
    return retStr.replace('href="../', 'href="http://lib.ustb.edu.cn:8080/')

