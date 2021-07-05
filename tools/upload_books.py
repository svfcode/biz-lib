import parse3 as parser
import addbook
import os
# import os.path

def upload_books(urls):
    categories = ['Логика', 'Воспитание детей', 'Питание']
    current_cat = categories[0]

    addbook.get_auth()

    for url in urls:
        try:
            book = parser.get_book(url)
            addbook.upload_book(current_cat, book)
        except:
            log = os.path.abspath(f'{os.getcwd()}/exceptions/{current_cat}.txt')
            log_doc = open(log, 'a+')
            log_doc.write(f'[ERROR] - url: {url}\n')
            log_doc.close()

    addbook.close_window()
