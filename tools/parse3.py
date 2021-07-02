import requests
from bs4 import BeautifulSoup
import json

def get_tor_session():
    session = requests.session()
    session.proxies = {
        'http':  'socks5h://127.0.0.1:9050',
        'https': 'socks5h://127.0.0.1:9050'
    }
    return session

session = get_tor_session()

# url = 'http://flibustahezeous3.onion/b/136049'
url = 'http://flibustahezeous3.onion/ajaxro/book?op=getFB2Info&b=165821&async=true'
print("Getting ...", url)
response = session.get(url)
print(response) # <Response [200]>

soup = BeautifulSoup(response.content, 'lxml')
p = soup.p
my_p = p.string
# print(type(my_p)) # <class 'bs4.element.NavigableString'>
# print(my_p) # <class 'bs4.element.NavigableString'>

myjson = json.loads(my_p)
print(type(myjson)) # <class 'dict'>
print(myjson['data']) # rus text
print(type(myjson['data'])) # rus text

# data = soup.pre
# print(data.text)

# print(soup) # text in unicode
# print(soup.decode('unicode').encode('utf-8')) # text in unicode

# print(type(soup)) # <class 'bs4.BeautifulSoup'>
# print(soup.contents) # text in unicode
# print(type(soup.contents)) # <class 'list'>
# print(soup.contents[0]) # text in unicode
# print(type(soup.contents[0])) # <class 'bs4.element.NavigableString'>

# Convert type(soup.contents[0]) - <class 'bs4.element.NavigableString'> To dict()
# print(dict(soup.contents[0])) # ValueError: dictionary update sequence element #0 has length 1; 2 is required
# data = soup.find('pre').extract()
# print(data) # 'NoneType' object has no attribute 'extract'
# pre = soup.p
# print(type(pre))


