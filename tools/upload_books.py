import parse3 as parser
import addbook


urls = [
    'http://flibustahezeous3.onion/b/165821',
    'http://flibustahezeous3.onion/b/136049',
    'http://flibustahezeous3.onion/b/495660'
]

categories = ['Логика', 'Воспитание детей', 'Питание']

addbook.get_auth()

for url in urls:
    book = parser.get_book(url)
    addbook.upload_book(categories[0], book)

addbook.close_window()
