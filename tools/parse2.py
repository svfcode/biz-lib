import requests
from bs4 import BeautifulSoup
from lxml import etree as et
import json
from xml.sax import saxutils as su

def get_tor_session():
    session = requests.session()
    # Tor uses the 9050 port as the default socks port
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
# print(response)
# dom = et.XML(str(response))
# print(dom)

# print(response.content)
soup = BeautifulSoup(response.content, 'html.parser')
temp = soup.text.decode("utf-8", "strict")
print(temp)
# temp.replace('lt;','<')
# temp.replace('gt;','>')
# site_json=json.loads(temp)
# temp2 = json.dumps(site_json, sort_keys=True, indent=4)
# print(soup)
# title = soup.find_all('book-title')
# print(title)

