#! /usr/bin/python

print 'Content-type: text/html'
print ''
age = 35
print age
pi = 3.14
print pi
name = "rahul"
print name
print age/pi
number = "5"
print number*age
#no output
#print number*pi 
print float(number)*pi
str = "My name is"
print str[0]
print str[0:5]
print str[5]
print str+name
myList = ["Rahul", "Abhishek", "Avinash"]
print myList
print myList[1]
print myList[2:4]
myTuple = (1,2,3,4)
print myTuple
print myTuple[2]
#No change possible 
#myTuple[2] = 5 
myList[2] = 5
dict = {}
dict["mom"] = "Kusum"
dict["dad"] = "Harish"
dict[1] = "Guddan"
dict[2] = "Varsha"
print dict
print dict["mom"]
print dict.keys()
print dict.values()
