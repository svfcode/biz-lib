from os import pipe
import requests
from bs4 import BeautifulSoup
import json
import re
from slugify import slugify

#-------------------------------------------------------------------------------------------------------
# Get session through proxy
#-------------------------------------------------------------------------------------------------------
def get_tor_session():
    session = requests.session()
    session.proxies = {
        'http':  'socks5h://127.0.0.1:9050',
        'https': 'socks5h://127.0.0.1:9050'
    }
    return session
#--------------------------------------------------------------------------------------------------------


#--------------------------------------------------------------------------------------------------------
# Get text from fb2 info block
#--------------------------------------------------------------------------------------------------------
def getText(url):

    session = get_tor_session()

    print("Getting info ...", url)
    response = session.get(url)
    print(response) # <Response [200]>

    soup = BeautifulSoup(response.content, 'lxml')

    title = soup.find('h1', {'class': 'title'}).text
    title_extension = re.search('\([\w]+\)$', title).group(0)
    title = title[:-len(title_extension)]

    author = soup.find('h1', {'class': 'title'}).findNext('a').text

    year = re.search('издание ([\d]+)', soup.text).group(0)
    year = re.search('(\d)+', year).group(0)

    description = soup.find(text="Аннотация").findNext('p').text

    # # Check title contains author name
    authorFIO = author.split()
    if not (authorFIO[0] in title or authorFIO[1] in title or authorFIO[2] in title):
        title = title + ' - ' + author

    slug = slugify(title)

    print({
        'title': title,
        'year': year,
        'author': author,
        'description': description,
        'slug': slug
    })
#--------------------------------------------------------------------------------------------------------


#--------------------------------------------------------------------------------------------------------
# Get image
#--------------------------------------------------------------------------------------------------------
def getImg(bookUrl, text):

    session = get_tor_session()

    print("Getting image from ...", bookUrl)
    response = session.get(bookUrl)
    print(response) # <Response [200]>

    soup = BeautifulSoup(response.content, 'lxml')
    img = soup.find('img', alt='Cover image')['src']
    url = 'http://flibustahezeous3.onion' + img

    response = session.get(url)
    open(f'images/{text["slug"]}.jpg', 'wb').write(response.content)

    return f'{text["slug"]}.jpg'
#--------------------------------------------------------------------------------------------------------

#--------------------------------------------------------------------------------------------------------
# Get book
#--------------------------------------------------------------------------------------------------------
def getBook(url, text):

    session = get_tor_session()

    print("Getting book from ...", url)
    response = session.get(url)
    print(response) # <Response [200]>

    soup = BeautifulSoup(response.content, 'lxml')

    link = soup.find('a', string=re.compile('скачать'))
    if link:
        url = 'http://flibustahezeous3.onion' + link['href']
        response = session.get(url)
        extension = re.search('([\w]+)\)$', link.text).group(0)[:-1]
        open(f'books/{text["slug"]}.{extension}', 'wb').write(response.content)
    else:
        link = soup.find('a', string=re.compile('fb2'))
        url = 'http://flibustahezeous3.onion' + link['href']
        response = session.get(url)
        open(f'books/{text["slug"]}.fb2', 'wb').write(response.content)
#--------------------------------------------------------------------------------------------------------

#--------------------------------------------------------------------------------------------------------
# Prepare links
#--------------------------------------------------------------------------------------------------------
def getBookId(url):
    return re.search('(\d)+$', url).group(0)
#--------------------------------------------------------------------------------------------------------
