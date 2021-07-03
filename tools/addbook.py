import mylib_upload as up


def upload_book(category, book):
    up.get_auth()

    up.add_book(category, book)
