#! /usr/bin/python

print 'Content-type: text/html'
print ''

import cgi
import random

form = cgi.FieldStorage()
reds = 0
whites = 0
if "answer" in form:
	answer = form.getvalue("answer")
else:	
	answer = ""
	for i in range(4):
		answer += str(random.randint(0,9)) 

if "guess" in form:
	guess = form.getvalue("guess")
	for key, digit in enumerate(guess):
		if digit == answer[key]:
			reds += 1			
		else:
			for answerDigit in answer:
				if answerDigit == digit:	
					whites += 1 
					break	
else:
	guess = ""
	
if "nog" in form:
	nog = int(form.getvalue("nog")) + 1 
else:
	nog = 0
	
if nog == 0:
	message = "I've choosen 4 digit number. Can you guess it?"
elif reds == 4:
	message = "Well Done!, You got in "+str(nog)+" guess(es). <a href='index.py'>Play Again!</a> "
else:
	message	= "You've "+str(reds)+" correct digit(s) in right places, "+str(whites)+" correct digit(s) in wrong places. You've "+str(nog)+" guess(es)."
	
print "<h1>Master Mind</h1>"
print "<p>"+message+"</p>"
print "<form method=post>"
print "<input type='text' name='guess' value='"+guess+"'>"	
print "<input type='hidden' name='answer' value='"+answer+"'>"	
print "<input type='hidden' name='nog' value='"+str(nog)+"'>"	
print "<input type='submit' value='Guess!'>"	
print "</form>"
