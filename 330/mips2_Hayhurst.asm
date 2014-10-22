	.data
Array: 	.word 14,12,13,5,9,11,3,6,7,10,2,4,8,1
	.text
	.globl main
main: 					#The Swap routine that we are supposed to do is a bubble sort from the end of the array
	li $a0, 14			#Parameter n = number values to sort
	sll $a0, $a0, 2			#Number of bytes in Array A
	li $t2, 1			#0 means there was a swap 1 means no swap
	li $t0, 0			#Holds t0 to move J
sub_routine1:
	beq $a0, 4, continue		#checks for out of bounds and if the array needs to continue 
	lw $t4, Array+4($t0)		#$t4 stores A[j+1]
	lw $t5, Array($t0)		#$t5 stores A[j]
	bgt $t4, $t5, no_swap		#if A[j+1] is greater than A[j] then goes to the label no_swap
	blt $t4, $t5, swap		#if A[j+1] is less than A[j] then goes to label swap

no_swap:
	addi $a0, $a0, -4		#subtracts four from $a0 to check  
	addi $t0, $t0, 4		#moves the marker 
	b sub_routine1			#goes back to the sub routine
			
swap:
	sw $t4, Array($t0)		#swaps $t4 with $t5
	sw $t5, Array+4($t0)		#swaps $t5 with $t4
	addi $a0, $a0, -4		#subtracts four from $a0 to check  
	addi $t0, $t0, 4		#moves the marker 
	li $t2, 0			#makes $t2 0 to signify that a swap has occured
	b sub_routine1			#goes back to the sub routine
	
					
continue:
	beq $t2, 0, main		#if a swap has occured start over again