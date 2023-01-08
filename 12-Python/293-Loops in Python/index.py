#! /usr/bin/python

print 'Content-type: text/html'
print ''
for  i in range(11):
	print i 
print "rajoriyas"
for  i in range(5, 11):
	print i 
favFoods = ["Icecream", "Pizza", "Burger"]
for food in favFoods:
	print "I like eating "+food+"."
x = 0
while x<=10:
	print x
	x += 1
ages = {}	
ages["rahul"] = 21
ages["guddan"] = 23
ages["varsha"] = 28
for age in ages:
	print age+" is "+str(ages[age])+"." 	