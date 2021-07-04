from tkinter import *

def clicked():
    lbl.configure(text="Я же просил...")

window = Tk()
window.geometry('400x250')

window.title("Добро пожаловать в приложение PythonRu")

lbl = Label(window, text="Привет", font=("Arial Bold", 50), bg="black", fg="red")
lbl.grid(column=0, row=0)

btn = Button(window, text="Не нажимать!")
btn.grid(column=1, row=0)

window.mainloop()
