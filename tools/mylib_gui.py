from tkinter import *
import upload_books as up

def show_window():

    def upload_books():
        print(urls)
        up.upload_books(urls)


    urls = []

    def delete_url(url):
        urls.remove(url)

        list_lbls = window.grid_slaves()
        for el in list_lbls:
            el.destroy()

        show_interface()
        print_urls()


    def print_urls():

        i = 2
        for url in urls:
            lbl = Label(window, text=url, font=("Verdana", 10))
            lbl.grid(column=0, row=i)
            btn = Button(window, width=10, text="delete", font=("Verdana", 10),
                command=lambda m=url: delete_url(m))
            btn.grid(column=1, row=i)
            i += 1


    window = Tk()
    window.geometry('800x450')
    window.title("Libteka")

    def show_interface():
        def add_url(temp):
            urls.append(txt.get())
            txt.delete(0, 'end')
            print_urls()

        btn = Button(window, width=90, text="Upload books", font=("Verdana", 10), command=upload_books)
        btn.grid(column=0, row=0)

        txt = Entry(window, width = 80)
        txt.grid(column=0, row=1)
        txt.focus()
        txt.bind('<Return>', add_url)

        btn = Button(window, text="Add book", command=add_url)
        btn.grid(column=1, row=1)

    show_interface()
    window.mainloop()

show_window()
