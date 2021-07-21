import parse3 as parser
import addbook
import os
# import os.path

def upload_books(urls):
    categories = [
        'Логика', 'Воспитание детей', 'Питание', 'Айкидо', 'Дзюдо',
        'Самбо', 'Бокс', 'Тайский бокс', 'Массаж', 'Секс', 
        'Дыхание', 'Сон', 'Гибкость', 'Развитие ребенка', 'Диалектика'
    ]
    current_cat = categories[14]

    addbook.get_auth()

    print(f'Total urls - { len(urls) }')
    excepts = 0
    for url in urls:
        try:
            print('Try parse and upload - ' + url)
            book = parser.get_book(url)
            addbook.upload_book(current_cat, book)
        except:
            excepts += 1
            log = os.path.abspath(f'{os.getcwd()}/exceptions/{current_cat}.txt')
            log_doc = open(log, 'a+')
            log_doc.write(f'[ERROR] - url: {url}\n')
            log_doc.close()
    print(f'All urls were parse and upload, excepts count - { excepts }')

    addbook.close_window()
