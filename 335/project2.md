1.1) uname returns Linux
1.2) Linux defender.pcs.cnu.edu 2.6.18-398.el5 #1 SMP Tue Sep 16 20:50:52 EDT 2014 x86_64 x86_64 x86_64 GNU/Linux
1.3) uname prints off system information 
1.4)no one else is logged into defender the output is JohnWesley.Hayhurst pts/0        2015-02-01 14:33 (10.128.16.100)
1.5)date prints Sun Feb  1 14:38:02 EST 2015
1.6)whoami prints out JohnWesley.Hayhurst

2.1) pwd prints /home/JohnWesley.Hayhurst
2.2)ls prints Windows/  www/
2.3)ls -a prints out ./  ../  .bash_history  .bashrc  .profile  Windows/  www/  .Xauthority
the special things about there file name is that they have an . before them
2.4)ls -al prints -rw------- 1 JohnWesley.Hayhurst 834232   69 Jan 25 10:53 .bash_history
this means it has read and write permissions
2.5)mkdir test
2.6) pwd returns /home/JohnWesley.Hayhurst/test
2.7) ls returns test/  Windows/  www/
2.8) rmdir test