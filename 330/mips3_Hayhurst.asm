	.text
   	.globl    main           
main:  
    	li $v0, 4               # Load syscall code for print_str.
    	la $a0, askstr1         # Load address of string.
   	syscall                 # Print string.
    	li $v0, 5               # Load syscall code for read.
  	syscall                 # Get argument 1
  	sw $v0, number1		# Stores the 1st number in number1
  	lw $t0, number1		# stores the 1st number in $t0
  	
  	li $v0, 4               # Load syscall code for printing a string.
    	la $a0, askstr2         # Load address of string.
   	syscall                 # Print string.
    	li $v0, 5               # Load syscall code for read.
  	syscall      		# Get argument 2
	sw $v0, number2		# Stroes the 2nd number in number2
	lw $t1, number2		# Stores the 2nd number in $t1
	
	li $v0, 4               # Load syscall code for printing a string.
    	la $a0, sumstr         	# Load address of string.
   	syscall                 # Print string.
	li $v0, 1		# Load syscall code for printing a number
	add $a0, $t0, $t1	# stores the sum in $a0 for printing
	syscall			# prints the sum of the two numbers

	li $v0, 4               # Load syscall code for printing a string.
    	la $a0, diffstr         # Load address of string.
   	syscall                 # Print string.
	li $v0, 1		# Load syscakk code for printing a number
	sub $a0, $t0, $t1	# stores the diff in $a0 for printing
	syscall			# prints the diff of the two numbers
	
	li $v0, 4               # Load syscall code for printing a string.
    	la $a0, productstr      # Load address of string.
   	syscall                 # Print string.
	li $v0, 1		# Load syscall code for printing a number
	mult $t0,$t1		# multiplies the two numbers passed in 
	mflo $a0		# moves the product into $a0 for printing
	syscall			# prints the product of the two numbers
	
	li $v0, 4               # Load syscall code for printing a string.
    	la $a0, quotstr        	# Load address of string.
   	syscall                 # Print string.
	li $v0, 1		# Loads syscall code for printing a number
	div $t0,$t1		# Divides the two numbers passed in
	mflo $a0		# Moves the quotient without remainder to $a0
	syscall			# Prints out the quotient without the ramiander
	li $v0, 4               # Load syscall code for printing a string.
    	la $a0, peroid        	# Load address of string.    	
   	syscall			# Prints out a peroid for adding the remainder
	mfhi $a0		# moves the remainder to $a0 for printing
	li $v0, 1		# Load syscall code for printing a number
	syscall			# prints the remainder

.data
number1:	.word 0
number2:	.word 0
askstr1:       .asciiz "Enter an integer."
askstr2:       .asciiz "Enter another integer."
sumstr:        .asciiz "\nTheir sum is : "
diffstr:	.asciiz "\nTheir difference is: "
productstr:	.asciiz "\nTheir product is: "
quotstr:	.asciiz "\nTheir quotient is:"
peroid:		.asciiz "."