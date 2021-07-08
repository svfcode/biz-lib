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

    response = session.get(url)

    soup = BeautifulSoup(response.content, 'lxml')

    title = soup.find('h1', {'class': 'title'}).text
    title_extension = re.search('\([\w]+\)$', title).group(0)
    title = title[:-len(title_extension)]

    author = soup.find('h1', {'class': 'title'}).findNext('a').text

    year = re.search('издание ([\d]+)', soup.text).group(0)
    year = re.search('(\d)+', year).group(0)

    description = ''
    description_first_p = soup.find(text="Аннотация").findNext('p')
    description_all_p = description_first_p.find_next_siblings('p')
    description += description_first_p.text
    for p in description_all_p:
        description += p.text

    # Check title contains author name
    authorFIO = author.split()
    is_title_contain_fio = False
    for el in authorFIO:
        if el in title: is_title_contain_fio = True
    if not is_title_contain_fio:
        title = title + ' - ' + author

    slug = slugify(title)

    return {
        'title': title,
        'year': year,
        'author': author,
        'description': description,
        'slug': slug
    }
#--------------------------------------------------------------------------------------------------------


#--------------------------------------------------------------------------------------------------------
# Get image
#--------------------------------------------------------------------------------------------------------
def getImg(bookUrl, text):

    session = get_tor_session()

    response = session.get(bookUrl)

    soup = BeautifulSoup(response.content, 'lxml')

    try:
        img = soup.find('img', alt='Cover image')['src']
        url = 'http://flibustahezeous3.onion' + img
        response = session.get(url)
        open(f'images/{text["slug"]}.jpg', 'wb').write(response.content)

        return f'{text["slug"]}.jpg'

    except:

        return f'[ERROR] Not image - {bookUrl}'
#--------------------------------------------------------------------------------------------------------

#--------------------------------------------------------------------------------------------------------
# Get book
#--------------------------------------------------------------------------------------------------------
def getBook(url, text):

    session = get_tor_session()

    response = session.get(url)

    soup = BeautifulSoup(response.content, 'lxml')

    link = soup.find('a', string=re.compile('скачать'))
    if link:
        url = 'http://flibustahezeous3.onion' + link['href']
        response = session.get(url)
        extension = re.search('([\w]+)\)$', link.text).group(0)[:-1]
        open(f'books/{text["slug"]}.{extension}', 'wb').write(response.content)

        return f'{text["slug"]}.{extension}'

    link = soup.find('a', string=re.compile('fb2'))
    url = 'http://flibustahezeous3.onion' + link['href']
    response = session.get(url)
    open(f'books/{text["slug"]}.fb2', 'wb').write(response.content)

    return f'{text["slug"]}.fb2'
#--------------------------------------------------------------------------------------------------------

#--------------------------------------------------------------------------------------------------------
# Prepare links
#--------------------------------------------------------------------------------------------------------
def getBookId(url):
    return re.search('(\d)+$', url).group(0)
#--------------------------------------------------------------------------------------------------------
