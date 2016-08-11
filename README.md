# wechat
806Lab wechat service.

## QRCODE
![QRCODE](./qrcode.jpg)

## Installation
### PHP Configuration
``` shell
git clone https://github.com/806Lab/wechat.git
cd wechat 
composer install
mv app/config/config.sample.php app/config/config.php
```

### Python Crawler
``` shell
nohup ./cli/crawler/server.py 8879 &
```
