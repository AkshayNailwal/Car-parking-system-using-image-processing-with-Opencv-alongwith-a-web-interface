import cv2
import numpy as np
import pytesseract
from PIL import Image
import pygame.camera

pygame.camera.init()
cam = pygame.camera.Camera(pygame.camera.list_cameras()[0])
cam.start()
img = cam.get_image()

import pygame.image
pygame.image.save(img, "opencv.jpg")
pygame.camera.quit()

sampleimage = cv2.imread("pp.jpg")

gray = cv2.cvtColor(sampleimage,cv2.COLOR_BGR2GRAY)

gray = cv2.threshold(gray,0,255,cv2.THRESH_TRUNC|cv2.THRESH_OTSU)[1]
gray = cv2.threshold(gray,0,255,cv2.THRESH_TOZERO|cv2.THRESH_OTSU)[1]
gray = cv2.threshold(gray,0,255,cv2.THRESH_BINARY|cv2.THRESH_OTSU)[1]
image_op = cv2.adaptiveThreshold(gray,255,cv2.ADAPTIVE_THRESH_GAUSSIAN_C,\
		cv2.THRESH_BINARY,11,2)

gray = cv2.medianBlur(image_op,3)


cv2.imwrite("processed.jpg",gray)

image_op1 = cv2.imread("processed.jpg")
blurred = cv2.blur(image_op1, (3,3))
img = Image.fromarray(blurred)
text = pytesseract.image_to_string(img)
print(text)

"""----------------------------Database portion--------------------------"""

import datetime
import mysql.connector
conn = mysql.connector.connect(host= "127.0.0.1",
                  user="root",
                  password="",
                  database="Project1")

now = datetime.datetime.now()
date= now.strftime("%Y-%m-%d")
time= now.strftime("%H:%M:%S")
x = conn.cursor()
x.execute ("INSERT INTO parking(car_number,entry_time,entry_date) values (%s,%s,%s)",(text,time,date))
conn.commit()
conn.close
