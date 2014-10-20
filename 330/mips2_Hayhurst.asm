	.data
Array: 	.word 14,12,13,5,9,11,3,6,7,10,2,4,8,1
	.text
	.globl main
main: 
	li $a0, 14
	sll $a0, $a0, 2

sub_routine1:
	lw $t4, Array+4($t0)
	lw $t5, Array($t0)
	bgt $t4, $t5, no_swap
	
no_swap:
	
	
	
swap:



