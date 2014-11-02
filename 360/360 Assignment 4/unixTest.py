'''
Created on Oct 26, 2014

@author: roberto.flores
'''
import unittest
import unix

class Test(unittest.TestCase):

    def test1(self):
        actual   = unix.ls([])
        expected = ['------------------------------------------------------------']
        self.assertEqual( expected, actual )

    def test2(self):
        actual   = unix.ls(['spongebob squarepants'])
        expected = ['------------------------------------------------------------',
                    'spongebob squarepants']
        self.assertEqual( expected, actual )

    def test3(self):
        actual   = unix.ls(['tiny','2short4me','very_long_file_name','shorter','size-1','size2','size3','much_longer_name','12345678.123','mid_size_name'])
        expected = ['------------------------------------------------------------',
                    '12345678.123         size-1             ',
                    '2short4me            size2              ',
                    'mid_size_name        size3              ',
                    'much_longer_name     tiny               ',
                    'shorter              very_long_file_name']
        self.assertEqual( expected, actual )

    def test4(self):
        actual   = unix.ls(['Weaser','Alfalfa','Stimey','Buckwheat','Porky','Joe','Darla','Cotton','Butch','Froggy','Mrs_Crabapple','P.D.'])
        expected = ['------------------------------------------------------------',
                    'Alfalfa        Cotton         Joe            Porky        ',
                    'Buckwheat      Darla          Mrs_Crabapple  Stimey       ',
                    'Butch          Froggy         P.D.           Weaser       ']
        self.assertEqual( expected, actual )

    def test5(self):
        actual   = unix.ls(['Mr._French','Jody','Buffy','Sissy','Keith','Danny','Lori','Chris','Shirley','Marsha','Jan','Cindy','Carol','Mike','Greg','Peter','Bobby','Alice','Ruben'])
        expected = ['------------------------------------------------------------',
                    'Alice       Chris       Jan         Marsha      Ruben     ',
                    'Bobby       Cindy       Jody        Mike        Shirley   ',
                    'Buffy       Danny       Keith       Mr._French  Sissy     ',
                    'Carol       Greg        Lori        Peter       '] 
        self.assertEqual( expected, actual )

    def test6(self):
        actual   = unix.ls(['abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefgz','123456789112345678921234567893123456789412345678951234567896','abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefgh','123456789112345678921234567893123456789412345678951234567896'])
        expected = ['------------------------------------------------------------',
                    '123456789112345678921234567893123456789412345678951234567896',
                    '123456789112345678921234567893123456789412345678951234567896',
                    'abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefgh',
                    'abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefgz']
        self.assertEqual( expected, actual )

    def test7(self):
        actual   = unix.ls(['tiny','2short4me','very_long_file_name','shorter','size-1','much_longer_name','12345678.123','mid_size_name','z'])
        expected = ['------------------------------------------------------------',
                    '12345678.123         size-1             ',
                    '2short4me            tiny               ',
                    'mid_size_name        very_long_file_name',
                    'much_longer_name     z                  ',
                    'shorter              ']
        self.assertEqual( expected, actual )

    def test8(self):
        actual   = unix.ls(['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','z','y','x','w','v','u','t','s','r','q','p','o','n','m','l','k','j','i','h','g','f','e','d','c','b','a'])
        expected = ['------------------------------------------------------------',
                    'a  b  d  e  g  h  j  k  m  n  p  q  s  t  v  w  y  z',
                    'a  c  d  f  g  i  j  l  m  o  p  r  s  u  v  x  y  ',
                    'b  c  e  f  h  i  k  l  n  o  q  r  t  u  w  x  z  ']
        self.assertEqual( expected, actual )

    def test9(self):
        actual   = unix.ls(['tiny','2short4me','very_long_file_name','shorter','size-1','size2','size3','much_longer_name','12345678.123','mid_size_name','zz'])
        expected = ['------------------------------------------------------------',
                    '12345678.123         size2              ',
                    '2short4me            size3              ',
                    'mid_size_name        tiny               ',
                    'much_longer_name     very_long_file_name',
                    'shorter              zz                 ',
                    'size-1               ']
        self.assertEqual( expected, actual )

    def test10(self):
        actual   = unix.ls(['koala.jpg','australia.exe','kangaroo.txt','foo.bar','homer.simpson'])
        expected = ['------------------------------------------------------------',
                    'australia.exe  homer.simpson  koala.jpg    ',
                    'foo.bar        kangaroo.txt   ']
        self.assertEqual( expected, actual )

    def test11(self):
        actual   = unix.ls(['bernardo_acm_unix_ls_accepted','finally','no_more_p_e'])
        expected = ['------------------------------------------------------------',
                    'bernardo_acm_unix_ls_accepted  no_more_p_e                  ',
                    'finally                        ']
        self.assertEqual( expected, actual )

    def test12(self):
        actual   = unix.ls(['1','2','3','4','5','1','2','3','4','5','1','2','3','4','5','1','2','3','4','5','1','2','3','4','5','1','2','3','4','5','1','2','3','4','5','1','2','3','4','5','1','2','3','4','5','1','2','3','4','5','1','2','3','4','5','1','2','3','4','5'])
        expected = ['------------------------------------------------------------',
                    '1  1  1  1  2  2  2  2  3  3  3  3  4  4  4  4  5  5  5  5',
                    '1  1  1  1  2  2  2  2  3  3  3  3  4  4  4  4  5  5  5  5',
                    '1  1  1  1  2  2  2  2  3  3  3  3  4  4  4  4  5  5  5  5']
        self.assertEqual( expected, actual )
