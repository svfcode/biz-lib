import mylib_parse as parse

def get_book(id):
    text = parse.getText(id)
    print(text)

    img = parse.getImg(id, text)
    print(img)

    book = parse.getBook(id, text)
    print(book)

    return {
        'text': text,
        'img': img,
        'book': book
    }









