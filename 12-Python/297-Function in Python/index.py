#! /usr/bin/python

print 'Content-type: text/html'
print ''
def sayHello():
	print "Hello"
sayHello()
def saySomething(something):
	print something
saySomething("Hi there!")	
def multiply(x, y):
	return x*y
print multiply(4, 6)	
def hCF(x ,y):
	for i in range(1, x+1):
		if(x%i==0 and y%i==0):
			hcf = i
	return hcf	
print hCF(5, 15)
a=10
b=11
def add():
	a=6
	return a+b
print add()
print a