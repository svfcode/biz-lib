import mylib_parse as parse

def get_book_id(url):
    return

def get_book(url):
    id = parse.getBookId(url)

    text = parse.getText(id)

    img = parse.getImg(url, text)

    book = parse.getBook(id, text)

    return {
        'text': text,
        'img': img,
        'book': book
    }









