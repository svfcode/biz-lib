import requests
from bs4 import BeautifulSoup

url = 
proxies = {
    'http':  'socks5://127.0.0.1:9052',
    'https': 'socks5://127.0.0.1:9052'
}
print(session.get("http://httpbin.org/ip").text)
