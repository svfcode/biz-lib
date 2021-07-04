from tkinter import *
from tkinter.ttk import Combobox

def clicked():
    res = "Привет {}".format(txt.get())
    lbl.configure(text=res)

window = Tk()
window.geometry('800x650')

window.title("Добро пожаловать в приложение PythonRu")

# combo = Combobox(window)
# combo['values'] = (1, 2, 3, 4, 5, "Текст")
# combo.current(1)  # установите вариант по умолчанию
# combo.grid(column=0, row=0)

lbl = Label(window, text="Привет", font=("Arial Bold", 50), bg="black", fg="red")
lbl.grid(column=0, row=0)

txt = Entry(window,width=10)
txt.grid(column=1, row=0)
txt.focus()

btn = Button(window, text="Не нажимать!", command=clicked)
btn.grid(column=2, row=0)

window.mainloop()
