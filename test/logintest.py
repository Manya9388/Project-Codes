from selenium import webdriver
import time
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select

print("Tshirt test case started")

options=webdriver.ChromeOptions()
options.add_experimental_option('excludeSwitches',['enable-logging'])
driver = webdriver.Chrome(options=options)
driver.maximize_window()
driver.get("http://localhost/clothing/login.html")
driver.find_element("id", "email").send_keys("silpa@gmail.com")
time.sleep(5)
driver.find_element("id", "password").send_keys("silpa@123")
time.sleep(5)
driver.find_element("id", "button").click()
time.sleep(5)



#
print("User Logged In and redirected to Tshirt Customize page")
driver.get("http://localhost/clothing/old/index.php")
driver.find_element("xpath", "/html/body/form/div/section/div[2]/div[3]/div/div[1]/input").click()
print("Customized Tshirt downloaded")
time.sleep(5)



size = driver.find_element(By.NAME, "size")
size.send_keys("S")
time.sleep(2)
img = driver.find_element(By.NAME, "timg")
img_path = "C:/xampp/htdocs/clothing/test/crop.png"
img.send_keys(img_path)
time.sleep(2)
driver.find_element("xpath", "/html/body/form/div/section/div[2]/div[4]/div/div[3]/input").click()
print("Customized Tshirt Upload and Requested")
# last = driver.find_element(By.NAME, "lastname[]")
# last.send_keys("Jovan")
# passenger = driver.find_element(By.NAME, "passenger-type")
# passenger.send_keys("Adult")
#
# driver.find_element("xpath", "/html/body/div[1]/div/section/div/div/div/div[2]/form/div[4]/div[2]/button").click()
# time.sleep(5)
#
# # Redirect to bookings page

# time.sleep(5)
# print("User redirected to my bookings page after reservation done")
# driver.get("http://localhost/train3/?page=food_order-index")
# time.sleep(5)
# print("User started to ordering food")
#
# driver.find_element("xpath", "/html/body/div[1]/div[1]/section/div/section/div/div/div/a").click()
# time.sleep(5)
# driver.find_element("xpath", "/html/body/div[1]/div/section/div/section/div/div/div/table/tbody/tr[1]/td[5]/a").click()
# time.sleep(5)
#
# date = driver.find_element(By.NAME, "time_schedule")
# date.send_keys("12:00")
# driver.find_element("xpath", "html/body/div[1]/div/section/div/section/div/div/div/form/input").click()
# time.sleep(5)
# print("ordering food")
# Close the browser
driver.quit()