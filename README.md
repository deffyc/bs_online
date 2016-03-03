#小型化 P2P 图书馆(V1.0 集中化版本)

#小型化 P2P 图书馆
**使用 PHP+Bootstarp 模仿[美团 P2P 图书馆](http://tech.meituan.com/mt-library-introduce.html)，借助豆瓣 API 和微信公众平台解决实验室成员日常相互借书的需求痛点。**

主页:

![homepage][1]

图书管理员端:
![图书管理员端][2]

成员端:
![成员端][3]

数据统计:
![数据统计][4]

##相关特性
**解决实验室固有图书的借阅管理问题**

 - **注：该版本为存在图书管理员版本**
 - 系统化、流程化管理和借阅图书和实验室成员管理系统对接，共享成员数据
 - 支持图书搜索、数据统计、图书信息修改、成员查看相关借阅历史信息
 - 支持新成员以及临时成员的信息录入
 - 录入图书信息时可选择使用 ISBN 直接录入，书籍信息将利用相关 API 从豆瓣直接抓取


  [1]: https://dn-leozhang2018.qbox.me/Screenshot%20from%202016-03-03%2012-05-13.png
  [2]: https://dn-leozhang2018.qbox.me/Screenshot%20from%202016-03-03%2011-50-48.png
  [3]: https://dn-leozhang2018.qbox.me/Screenshot%20from%202016-03-03%2012-03-57.png
  [4]: https://dn-leozhang2018.qbox.me/Screenshot%20from%202016-03-03%2012-06-29.png


##How to use:

 - 下载源码后,解压至相关 Web 服务器目录(需提前部署好数据库+PHP)
 - 数据库文件为 SQL/bs_online.sql（其中有部分书籍信息残留数据，使用时请清除）,数据库连接文件为 **dbcon.php 及 librarian/dbcon.php**,使用时注意修改
 - /home/leozhang/Desktop/html/bs_online/contact.php
 - 默认管理员用户名以及密码为:admin
 - 数据统计部分采用数据库事件方式实现，需提前编写相关 SQL 语句，设置数据库事件
