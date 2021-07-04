from tkinter import *



def show_window():

    def upload_books():
        print(urls)

    urls = []

    def print_urls():
        i = 2
        for url in urls:
            lbl = Label(window, text=url, font=("Verdana", 10))
            lbl.grid(column=0, row=i)
            i += 1


    def add_url():
        urls.append(txt.get())
        txt.delete(0, 'end')
        print_urls()


    window = Tk()
    window.geometry('800x450')
    window.title("Libteka")

    btn = Button(window, width=90, text="Upload books", font=("Verdana", 10), command=upload_books)
    btn.grid(column=0, row=0)

    txt = Entry(window, width = 80)
    txt.grid(column=0, row=1)
    txt.focus()

    btn = Button(window, text="Add book", command=add_url)
    btn.grid(column=1, row=1)

    window.mainloop()

show_window()
