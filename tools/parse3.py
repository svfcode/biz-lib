import mylib_parse as parse

def get_book_id(url):
    return

def get_book(url):
    id = parse.getBookId(url)

    text = parse.getText(url)

    img = parse.getImg(url, text)

    book = parse.getBook(url, text)

    return {
        'text': text,
        'img': img,
        'book': book
    }









