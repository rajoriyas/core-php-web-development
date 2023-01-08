#! /usr/bin/python

print 'Content-type: text/html'
print ''
name = "Rahul"
if name == "Rahul" or name == "rajoriyas":
	print "Hello "+name
else:
	print "I don't know you"
primeNo = 0
i = 2
while primeNo <= 50:
	isPrime = True
	for j in range(2,i):
		if i%j==0:
			isPrime = False
	if isPrime == True:
		primeNo += 1
		print i	
	i += 1	
	
		