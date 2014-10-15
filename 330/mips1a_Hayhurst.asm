
		.text 		
__start:	la $t0, 268501056 	# makes the base address to be the number 
		li $t1, 13 		# loads 13 to be the value of $t1
		sw $t1, 4($t0) 		# stores the value of $t1 to the array with an offset of 4
		li $t1, 100 		# loads 100 to be the value of $t1
		sw $t1, -16($t0) 	# stores the value of $t1 to the array with an offset of -16
		li $t1, 15 		# loads 15 to be the value of $t1
		sw $t1, 24($t0) 	# stores the value of $t1 to the array with an offset of 24
		li $t1, 4294967295 	# loads 4294967295 to be the value of $t1
		sw $t1,40($t0) 		# stores the value of $t1 to the array with an offset of 40
		
