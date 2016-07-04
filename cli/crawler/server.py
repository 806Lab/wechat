#! /usr/bin/env python
# coding=utf-8
import web
import requests
import crawler

urls = (
    '/', 'index',
    '/teach', 'teach',
    '/lib', 'lib'
)


class index:
    def GET(self):
        return "Hello, world!"


class teach:
    def GET(self):
        s = requests.session()
        i = web.input()
        uname = i.uname
        passwd = i.passwd
        pattern = i.pattern

        crawler.teach_login(s, uname, passwd)
        try:
            if pattern == "classtable":
                return crawler.teach_classtable(s)
            elif pattern == 'scores':
                return crawler.teach_scores(s)
            elif pattern == 'innovative_score1':
                return crawler.teach_innovative_score1(s)
            elif pattern == 'innovative_score2':
                return crawler.teach_innovative_score2(s)
            else:
                return "Not Found"
        except Exception:
            return u"读取错误，请检查密码是否正确后重新绑定"


class lib:
    def GET(self):
        i = web.input()
        uname = i.uname
        passwd = i.passwd
        try:
            res = crawler.lib_borrowed_books(uname, passwd)
            return res
        except Exception:
            return u"读取错误，请检查密码是否正确后重新绑定"

if __name__ == "__main__":
    app = web.application(urls, globals())
    app.run()
