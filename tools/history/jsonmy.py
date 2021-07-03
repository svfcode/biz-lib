import json

data = {
    "a" : 1,
    "b" : (1,2,3)
}

# Serialize obj to a JSON formatted str
print(json.dumps(data, sort_keys=True, indent=4))
print('data - ', data['b'][1])

str = "{'a' : 1}"
print(type(str)) # <class 'str'>
print(str)       # {'a' : 1}

str = json.dumps(str) # Serialize obj to a JSON formatted str
print(type(str)) # <class 'str'>
print(str)       # "{'a' : 1}"

# Deserialize s (a str, bytes or bytearray instance containing a JSON document) to a Python object
str = json.loads(str)
print(type(str)) # <class 'str'>
print(str)       # {'a' : 1}

str = '\u043f\u0440\u0435\u0434\u043e'
print(str)
# str = json.loads(str)
# print(type(str)) # <class 'str'>
# print(str)       # {'a' : 1}

# print(json.detect_encoding(str))

# dataStr = json.load(dataStr)

# print(dataStr['b'][1])

# data2 = json.loads("{'a':1}")

# print(data2)

# str = '\u043f\u0440\u0435\u0434\u043e'
# json.detect_encoding(str)
