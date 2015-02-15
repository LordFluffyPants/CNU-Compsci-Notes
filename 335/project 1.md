1.1)Software Loopback Interface 1
        Link encap: Local loopback
        inet addr:127.0.0.1 Mask: 255.0.0.0
        MTU: 1500 Speed:1073.74 Mbps
        Admin status:UP Oper status:OPERATIONAL
        RX packets:0 dropped:0 errors:0 unkown:0
        TX packets:0 dropped:0 errors:0 txqueuelen:0


1.2) ping returns:
Pinging 127.0.0.1 with 32 bytes of data:
Reply from 127.0.0.1: bytes=32 time<1ms TTL=128
Reply from 127.0.0.1: bytes=32 time<1ms TTL=128
Reply from 127.0.0.1: bytes=32 time<1ms TTL=128
Reply from 127.0.0.1: bytes=32 time<1ms TTL=128

Ping statistics for 127.0.0.1:
    Packets: Sent = 4, Received = 4, Lost = 0 (0% loss),
Approximate round trip times in milli-seconds:
    Minimum = 0ms, Maximum = 0ms, Average = 0ms

1.3) the primary address of my computer is 10.128.16.12 which i found from the returned information
Realtek PCIe GBE Family Controller
        Link encap: Ethernet HWaddr: 94-DE-80-0F-B3-12
        inet addr:10.128.16.12 Mask: 255.255.254.0
        MTU: 1500 Speed:1000.00 Mbps
        Admin status:UP Oper status:OPERATIONAL
        RX packets:198529 dropped:0 errors:0 unkown:0
        TX packets:63897 dropped:0 errors:0 txqueuelen:0


1.4) pinging my primary address returns:
Pinging 10.128.16.12 with 32 bytes of data:
Reply from 10.128.16.12: bytes=32 time<1ms TTL=128
Reply from 10.128.16.12: bytes=32 time<1ms TTL=128
Reply from 10.128.16.12: bytes=32 time<1ms TTL=128
Reply from 10.128.16.12: bytes=32 time<1ms TTL=128

Ping statistics for 10.128.16.12:
    Packets: Sent = 4, Received = 4, Lost = 0 (0% loss),
Approximate round trip times in milli-seconds:
    Minimum = 0ms, Maximum = 0ms, Average = 0ms

This means that the interface is "alive"

1.5) The IP address is 10.128.16.12 and the subnet mask is 255.255.254.0
	so the IP network address is 10.128.16.0

1.6) The IP address is 192.168.1.101 and the subnet mask is 255.255.254.0
	so the IP network broadcast address is 192.168.1.255

2.1) The ethernet HWaddr: 94-DE-80-0F-B3-12

2.2) One ethernet address from the arp command is the internet address of 10.128.16.18 with the physical address of 50-1a-c5-39-cf-89

2.3) doing arp 10.128.16.22 does not send back any information therefore that IP address is not in use

2.4) when typing in ping 10.128.16.250 we get 
Pinging 10.128.16.250 with 32 bytes of data:
Reply from 10.128.16.12: Destination host unreachable.
Reply from 10.128.16.12: Destination host unreachable.
Reply from 10.128.16.12: Destination host unreachable.
Reply from 10.128.16.12: Destination host unreachable.

Ping statistics for 10.128.16.250:
    Packets: Sent = 4, Received = 4, Lost = 0 (0% loss),

When pinging 10.128.16.18 we get 
Pinging 10.128.16.18 with 32 bytes of data:
reply from 10.128.16.18: bytes = 32 time 906ms TTL=128
reply from 10.128.16.18: bytes=32 time 2ms TTL=128
Request timed out
request timed out
Ping statistics for 10.128.16.18
	Packets: Sent = 4, Received = 2, Lost = 2 (50% loss),
Approximate round trip times in milli-seconds:
	Minimum = 2ms, Maximum = 906ms, Average = 454ms

When pinging 10.128.16.1 we get 
Pinging 10.128.16.1 with 32 bytes of data:
Reply from 10.128.16.1: bytes=32 time=1ms TTL=64
Reply from 10.128.16.1: bytes=32 time<1ms TTL=64
Reply from 10.128.16.1: bytes=32 time<1ms TTL=64
Reply from 10.128.16.1: bytes=32 time=1ms TTL=64

Ping statistics for 10.128.16.1:
    Packets: Sent = 4, Received = 4, Lost = 0 (0% loss),
Approximate round trip times in milli-seconds:
    Minimum = 0ms, Maximum = 1ms, Average = 0ms

2.5) pinging 10.128.16.255 says
Pinging 10.128.16.255 with 32 bytes of data:
Reply from 10.128.16.12: Destination host unreachable.
Reply from 10.128.16.12: Destination host unreachable.
Reply from 10.128.16.12: Destination host unreachable.
Reply from 10.128.16.12: Destination host unreachable.

Ping statistics for 10.128.16.255:
    Packets: Sent = 4, Received = 4, Lost = 0 (0% loss),

3.1) something in common with the IP addresses is that ones connected to the same area network have the same first 3 numbers and then change the last number from computer to computer

3.2)The default gateway is 10.128.16.1 as indicated by the network destination being 0.0.0.0 and the Netmask being 0.0.0.0

##Google
4.1) Reply from 173.194.121.48: bytes=32 time=10ms TTL=51

4.2) Packets: Sent = 10, Received = 10, Lost = 0 (0% loss),

4.3) Approximate round trip times in milli-seconds:
    Minimum = 9ms, Maximum = 10ms, Average = 9ms

##Brown
4.4) Reply from 128.148.32.12: bytes=32 time=25ms TTL=46

4.5) Packets: Sent = 10, Received = 10, Lost = 0 (0% loss),

4.6) Approximate round trip times in milli-seconds:
    Minimum = 23ms, Maximum = 25ms, Average = 23ms

##Berkley
4.7) Reply from 169.229.216.200: bytes=32 time=84ms TTL=46

4.8) Packets: Sent = 10, Received = 10, Lost = 0 (0% loss),

4.9) Approximate round trip times in milli-seconds:
    Minimum = 81ms, Maximum = 101ms, Average = 85ms

##UM
4.10) Reply from 128.250.37.164: bytes=32 time=238ms TTL=230

4.11) Packets: Sent = 10, Received = 10, Lost = 0 (0% loss),

4.12) Approximate round trip times in milli-seconds:
    Minimum = 238ms, Maximum = 238ms, Average = 238ms

4.13) Reply from 64.233.171.99: bytes=32 time=16ms TTL=42

4.14) Packets: Sent = 4, Received = 4, Lost = 0 (0% loss)

4.15) Approximate round trip times in milli-seconds:
    Minimum = 16ms, Maximum = 17ms, Average = 16ms


4.16) Reply from 74.125.29.106: bytes=64 (sent 1024) time=38ms TTL=38

4.17) Packets: Sent = 4, Received = 4, Lost = 0 (0% loss),

4.18) Approximate round trip times in milli-seconds:
    Minimum = 17ms, Maximum = 38ms, Average = 22ms

4.19)The differences although slight are due to the result of an increase in data being sent to and from the computer and the server

4.20) Even though i recieved responces from all of the servers the reasons that i may not have would be to a timeout connection, the packet could have been lost.

4.21) The distance to the host does not neccisarily determines the time it takes to but is one of the factors. Some factors include distance, packet size, and bandwidth to name a couple.

4.22) Tracing route to www.google.com [74.125.22.105]
over a maximum of 30 hops:

  1     1 ms     1 ms     1 ms  10.128.16.1
  2    <1 ms    <1 ms    <1 ms  172.16.77.42
  3     1 ms     1 ms    <1 ms  172.16.77.253
  4     1 ms     1 ms     1 ms  137.155.255.226
  5     3 ms     2 ms     3 ms  ip-216-54-74-105.coxfiber.net [216.54.74.105]
  6     *        *        *     Request timed out.
  7     *        *        *     Request timed out.
  8     3 ms     3 ms     3 ms  68.10.8.157
  9     9 ms     9 ms     9 ms  ashbbprj01-ae2.rd.as.cox.net [68.1.0.242]
 10     9 ms     9 ms    10 ms  68.105.30.118
 11    10 ms     9 ms    21 ms  209.85.252.80
 12    10 ms    10 ms    10 ms  216.239.43.67
 13    18 ms    17 ms    17 ms  209.85.143.127
 14    17 ms    17 ms    17 ms  72.14.233.39
 15     *        *        *     Request timed out.
 16    17 ms    17 ms    17 ms  qh-in-f105.1e100.net [74.125.22.105]

Trace complete.

4.23) Traceroute shows the entire path the packets flow through to there destination. To do this it will send a packet with a TTL of 1 to the destination. Then when it goes one hop the TTl will become zero and tell me where that TTL became zero. it will do this until it reaches its host destination cataloging the path it took.