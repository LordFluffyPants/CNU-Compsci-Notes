 
		.data 
scores: 	.word 145, 95, 92, 85, 100, 81, 90, 75, 99, -124, 82, 79, -1 
avgstr: 	.asciiz "The average is " 
remstr: 	.asciiz " with a remainder of " 
		.text
__start:	la $a0, scores			# Will hold the Array list of scores with a terminating # of -1
		li $t0, 0			# Will hold the score counter to be used in the compilation of the average
		li $t1, 0			# Will hold the sum of the scores to be used in the compilation of the average
		li $t2, 0			# Will be a temp for the compilation of the score
		li $t3, 0			# Will be a temp variable
		li $t4, -1			# Will hold the terminator marker of -1
		
begin: 		lw $t3 , 0($a0)			# Holds the numerical value of $a0
		beq $t4, $t3, compAvg 		# Starts the loop of computing the averages
		blt $t3,0, incrmnt		# Will ignore the number if it is < 0
		bgt $t3,100, incrmnt		# Will ignore the number if it is > 100
		add $t1, $t1, $t3		# Adds the value of $t2($a0) to $t1
		add $t0, $t0, 1			# Adds 1 to the score count 

incrmnt:	addi $a0, $a0 ,4		# Incriments $t2 by 4 to create an offset
		b begin				# Goes back to the beggining of the loop
		

compAvg:	div $t1, $t0			# Divides $t1 by $t0 stored in lo and hi
		mflo $a1			# The average is moved from lo to $a1
		mfhi $a2			# The remander is moved from hi to $a2
		
		li $v0, 4			# Makes the value of $v0 4 for printing string
		la $a0, avgstr			# Makes $a0 the string "The average is "
		syscall 			# Prints out $a0
		li $v0, 1			# Makes the value of $v0 1 for printing ints
		move $a0, $a1			# Makes $a0 $a1 for printing
		syscall				# Prints out $a0
		li $v0, 4			# Makes the value of $v0 4 for printing string
		la $a0, remstr			# Makes $a0 the string "The remander is "
		syscall				# Prints out $a0
		li $v0, 1			# Makes the value of $v0 1 for printing ints
		move $a0, $a2			# Makes $a0 $a2 for printing
		syscall				# Prints out $a0
		
	
