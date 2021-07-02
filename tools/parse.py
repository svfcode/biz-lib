import requests
from bs4 import BeautifulSoup

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

title = soup.find("h1", class_="title").text

print(title)
