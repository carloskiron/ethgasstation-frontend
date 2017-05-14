import mysql.connector
import pandas as pd
import numpy as np
import statsmodels.api as sm

cnx = mysql.connector.connect(user='ethgas', password='station', host='127.0.0.1', database='tx')
cursor = cnx.cursor()

# First Query to Determine Block TIme, and Estimate Miner Policies
query = ("SELECT * FROM speedo where speedo.blockNum>=3702847")

cursor.execute(query)
head = cursor.column_names

minerData = pd.DataFrame(cursor.fetchall())
minerData.columns = head
cursor.close()

print (minerData)
