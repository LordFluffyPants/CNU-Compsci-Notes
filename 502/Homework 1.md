Q4 - 	A) there can be 16 simultanious connections because there are 4 links and each link can support 4 simultanious connections
	 		B) there can be 8 simultanoious connections because now there are only 2 links and each link can support 4 simultanious connections
	 		C) Yes we can accomedate all 8 connections, 2 lines between each pair of switches dedicated to A and C and B and D
Q6 - 	A) M/S
	 		B) L/R
	 		C) M/S + L/R
	 		D) The last bit will be on the line because of the propagation delay
	 		E) The first bit will still be on the line because of the propagation delay is greater than the transmission time
	 		F) Its at B because the propagation delay is shorter than the transmission
	 		G) M = 535714.28571428571429
Q7  - 	The time it takes to construct a packet is 6.9ms the time to send it without prop delay is .224ms the propagation delay is 10ms so it is 			17.1ms delay
Q10 - 	(L/R1 + d1/s1) + (L/R2 + d2/s2) + (L/R3 + d3/s3) + 2dproc
		18 + 1/25 + .006 seconds = 18.046 seconds
Q12 - 	In general terms the time it takes for a packet to get out of the queue is X/R * N
Q13 - A) L/R * N because we assume the link has to finish sending / receiving a packet before we accapt another another one
			B) L/R because we are recieving N packets every LN/R seconds so to find that average we would divide by N
Q25 -	A) The propagation delay is 2/25 seconds so then the bandwidth delay is 4/25 * 10^6
			B) The number of bits that that can be sent on the line at any given time is 4/25 * 10^6 as that represents our bottle neck
			C) The bandwidth-delay product is the bottleneck of how many bits you can have on the line at any given moment
			D) we know that the line can only hold up 1.6*10^5 bits. The line is 2*10^7 meters so then we have 125 meters per bit
			E) The width of a bit can be interpreted by S/R
Q26 - Let L to be the length of the link is then interperated by S/R then in terms of R = S/L
Q27 - A) the prop delay is 2/25 seconds the bandwith delay product is 8 * 10^7 bits
			B) so when sending 800,000 bits over the line the bandwith is bigger so then the maximum amount we can have in this example is 800,000 bits
			C) .25 meters

Aditional Question 1)
	1) The bit rate of one circuit is rt/ts = 2^11 * 10^3 /2^5 = 64000 b/s
	2) 8 b/ts * 2^8 *10^3 ts/s = 2048000 b/s
	3) L / rs which is 8*10^6 / 64*10^3 = 1/8 * 10^3
	4) L/N*rs which is  25/3 so at least 9 circuits
	5) to make it the shortest time we compound all 9 circuits and then the shortest time is 13.88 seconds

Additional Question 2)
	1) The effective transmission rate is transmission rate divided total users for the time it takes to send a packet is the packet length divided by the transmission rate so 12 ms
	2) we would send 666667 packets the last packet would be of length 1000 bytes or 1k byte
	3) file size divided by the effective transfer rate is 8 * 10^9 / 10^6 = 8 * 10^3
