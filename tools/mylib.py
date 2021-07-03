import requests
from bs4 import BeautifulSoup
import json
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
def getText(bookId):

    session = get_tor_session()

    url = f'http://flibustahezeous3.onion/ajaxro/book?op=getFB2Info&b={bookId}&async=true'
    print("Getting fb2 info ...", url)
    response = session.get(url)
    print(response) # <Response [200]>

    soup = BeautifulSoup(response.content, 'lxml')
    p = soup.p
    my_p = p.string
    myjson = json.loads(my_p)
    text = myjson['data']
    text = text.replace('&lt;','<')
    text = text.replace('&gt;','>')
    text = text.replace('&quot;','"')
    # print(text) # rus text

    soup = BeautifulSoup(text, 'lxml')

    year = soup.year.text
    title = soup.find('book-name').text
    description = soup.find('annotation').text.strip()

    first_name = soup.find('first-name').text
    middle_name = soup.find('middle-name').text
    last_name = soup.find('last-name').text
    author = f'{first_name} {middle_name} {last_name}'

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
def getImg(bookId, text):

    session = get_tor_session()

    url = f'http://flibustahezeous3.onion/i/49/{bookId}/cover.jpg'
    print("Getting image from ...", url)
    response = session.get(url)
    print(response) # <Response [200]>
    open(f'images/{text["slug"]}.jpg', 'wb').write(response.content)

    return f'{text["slug"]}.jpg'
#--------------------------------------------------------------------------------------------------------

#--------------------------------------------------------------------------------------------------------
# Get image
#--------------------------------------------------------------------------------------------------------
def getBook(bookId, text):

    session = get_tor_session()

    url = f'http://flibustahezeous3.onion/b/{bookId}/fb2'
    print("Getting book from ...", url)
    response = session.get(url)
    print(response) # <Response [200]>
    open(f'books/{text["slug"]}.fb2', 'wb').write(response.content)

    return f'{text["slug"]}.fb2'
#--------------------------------------------------------------------------------------------------------
