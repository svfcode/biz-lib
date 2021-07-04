import parse3 as parser
import addbook


urls = []

categories = ['Логика', 'Воспитание детей', 'Питание']

addbook.get_auth()

for url in urls:
    book = parser.get_book(url)
    addbook.upload_book(categories[0], book)

addbook.close_window()
