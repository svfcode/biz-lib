import parse3 as parser
import addbook

id = 136049
categories = ['Логика', 'Воспитание детей', 'Питание']

book = parser.get_book(id)

addbook.upload_book(categories[0], book)

