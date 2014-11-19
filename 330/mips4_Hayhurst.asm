	.text
	.globl main
main:
	li $v0, 4               	# Load syscall code for print_str.
    	la $a0, choose         		# Load address of string.
   	syscall                 	# Print string.
	li $v0, 5               	# Load syscall code for read.
  	syscall				#Reads the number for Fahrenheit or Celsius
	beq $v0, 1, FahrenheitToC	#If 1 is chosen then will branch to Fahrenheit to Celsius conversion
	beq $v0, 2, CelsiusToF		#If 2 is chosen then will branch to Fahrenheit to Celsius conversion
	b main

FahrenheitToC:

	#C = (F – 32)*100/180 
	li $v0, 4               	# Load syscall code for print_str.
    	la $a0, floating        	# Load address of string.
   	syscall                 	# Print string.
   	li $v0, 6 			# Load 6 = read_float into $v0
	syscall				# $f0 contains float
	l.s $f1, f1			# Loads -32 into $f1
	l.s $f2, f2			# Loads 100 into $f2
	l.s $f4, f3
	add.s $f3,$f0,$f1
	mul.s $f3, $f3, $f2
	div.s $f3, $f3, $f4
	mov.s $f12, $f3 		# Copy $f3 to $f12
	li $v0, 2 			# Load 2 = print_float into $v0
	syscall 			# print value in $f12
	# See if it’s cold
	l.s $f1, f4 			# $f1 = constant -17.78
	c.lt.s $f3, $f1 		# compare temp and 0: 
					# if ($f3 < $f1) set coprocessor condition flag=1 
					# else condition flag = 0
	bc1f isHotC			# branch on FP false
	li $v0, 4               	# Load syscall code for print_str.
    	la $a0, cold        		# Load address of string.
    	syscall                 	# Print string.
isHotC:	# See if it's hot
	l.s $f1, f5
	c.lt.s $f3, $f1
	bc1f printhot
	b final	



CelsiusToF:
	li $v0, 4               	# Load syscall code for print_str.
    	la $a0, floating        	# Load address of string.
   	syscall                 	# Print string.
	li $v0, 6 			# Load 6 = read_float into $v0
	syscall				# $f0 contains float
	l.s $f1, c1 			# Load Floating Point Single conversion factor 1
	l.s $f2, c2 			# Load Floating Point Single conversion factor 2
	mul.s $f3, $f0, $f2 		# C*180/100
	add.s $f3,$f3, $f1 		# F = 32 + C*180/100
	mov.s $f12, $f3 		# Copy $f3 to $f12
	li $v0, 2 			# Load 2 = print_float into $v0
	syscall 			# print value in $f12
	li $v0, 4               	# Load syscall code for print_str.
    	la $a0, F	        	# Load address of string.
   	syscall                 	# Print string.
	# See if it’s cold
	l.s $f1, c3 			# $f1 = constant 0.0
	c.lt.s $f3, $f1 		# compare temp and 0: 
					# if ($f3 < $f1) set coprocessor condition flag=1 
					# else condition flag = 0
	bc1f isHotF			# branch on FP false
	li $v0, 4               	# Load syscall code for print_str.
    	la $a0, cold        		# Load address of string.
    	syscall                 	# Print string.
isHotF:	# See if it's hot
	l.s $f1, c4
	c.lt.s $f3, $f1
	bc1f printhot
	b final
	
	
printhot:	
	li $v0, 4               	# Load syscall code for print_str.
    	la $a0, hot       		# Load address of string.
    	syscall                 	# Print string.
    	b final
final:
	li $v0, 10 			# Exit
	syscall

.data
choose:		.asciiz "Enter 1 to convert from Fahrenheit to Celsius or enter 2 to convert from Celsius to Fahrenheit: "
floating:	.asciiz "\nEnter a floating temperature:"
cold:		.asciiz "\nThat's COLD!!!"
hot:		.asciiz	"\nThat's HOT!!!"
FtoCstr:	.asciiz "The Temperature in Celsius: "
CtoFstr:	.asciiz "The Temperature in Fahrenheit: "
F:		.asciiz " F"
C:		.asciiz " C"
c1:		.float	32
c2:		.float 1.8
c3:		.float 0.0
c4:		.float 120
f1:		.float -32		
f2:		.float 100
f3:		.float 180
f4:		.float -17.78
f5:		.float 48.89