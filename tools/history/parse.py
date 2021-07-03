import requests
from bs4 import BeautifulSoup
import re
from lxml import etree as et

def get_tor_session():
    session = requests.session()
    # Tor uses the 9050 port as the default socks port
    session.proxies = {
        'http':  'socks5h://127.0.0.1:9050',
        'https': 'socks5h://127.0.0.1:9050'
    }
    return session

session = get_tor_session()

url = 'http://flibustahezeous3.onion/b/136049'
print("Getting ...", url)
response = session.get(url)
soup = BeautifulSoup(response.content, 'html.parser')
dom = et.HTML(str(soup))

info = dom.xpath('/html/body/div/div[2]/div[1]/div/div[4]/pre')
print(info)
# info = etree.XML(str(info))
# root = info.getroot()

# for child_of_root in root.iter:
#     print(child_of_root.text)
# info = BeautifulSoup(info, 'xml')
# info = etree.HTML(str(info)

title = dom.xpath('//html/body/div/div[2]/div[1]/div/h1')[0].text
# title = info.find('book-title')
# info.select()
print(title)


# author = dom.xpath('/html/body/div/div[2]/div[1]/div/a[1]')[0].text
# print(author)

# year = dom.xpath('/html/body/div/div[2]/div[1]/div/a[2]')
# print(year)
