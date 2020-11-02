import requests
import json

#Taken mostly from Postman
#Author Carson, for all testing and formatting into JSON
url = "https://us.api.blizzard.com/hearthstone/cards?locale=en_US&gameMode=battlegrounds&tier=1%2C2%2C3%2C4%2C5%2C6"

payload = {}
headers = {
  'Authorization': 'Bearer USIWlA0ZQhTXfUZvb5Q2h5Fn1WnDGINWM3'
}

response = requests.request("GET", url, headers=headers, data = payload)

json_object = response.json()


json_str = json.dumps(json_object)

dict1 = json.loads(json_str)

for element in json_object:
  del element['id']

print(dict1)

json_formatted = json.dumps(json_object, indent=2)

#print(json_formatted)
input()
#print(response.text.encode('utf8'))