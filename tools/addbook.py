import mylib_upload as up


def get_auth():
    up.get_auth()

def upload_book(category, book):
    up.add_book(category, book)

def close_window():
    up.closeWindow()
