import time
import urllib
from selenium import webdriver
from selenium.common.exceptions import NoSuchElementException
from selenium import webdriver
from selenium.webdriver.support.ui import Select


browser = webdriver.Chrome('C:\drivers\chromedriver.exe')

def check_exists_by_xpath(xpath):
    try:
        browser.find_element_by_xpath(xpath)
    except NoSuchElementException:
        return False
    return True

# Synchron function
def expectect_element(xpath):
  while not check_exists_by_xpath(xpath):
    print('[LOG]: Sleep for xpath - ' + xpath + '\n')
    time.sleep(1)
  return True

def get_auth():
    browser.get('https://libteka.ru/admin/login')
    input_login_xpath = '/html/body/main/div/form/div/div[1]/input'
    input_login_text = 'libadmin'
    expectect_element(input_login_xpath)
    browser.find_element_by_xpath(input_login_xpath).send_keys(input_login_text)

    input_password_xpath = '/html/body/main/div/form/div/div[2]/input'
    input_password_text = 'phpbest1'
    expectect_element(input_password_xpath)
    browser.find_element_by_xpath(input_password_xpath).send_keys(input_password_text)

    auth_form_submit_btn = '/html/body/main/div/form/div/div[3]/input'
    expectect_element(auth_form_submit_btn)
    browser.find_element_by_xpath(auth_form_submit_btn).click()

def add_book(category, book):
    # Go to create book page
    create_book_btn = '/html/body/main/div/div[1]/a[4]/div'
    expectect_element(create_book_btn)
    browser.find_element_by_xpath(create_book_btn).click()

    # Select category
    select_category = '/html/body/main/div/form/table/tbody/tr[1]/td[2]/select'
    expectect_element(select_category)
    dropdown = browser.find_element_by_xpath(select_category)
    select = Select(dropdown)
    select.select_by_visible_text(category)

    # Write text
    

