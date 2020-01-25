`8951781211005057107977111510373718610473717011890109534873721081189772821139751661217372851039087864889517761`

The name of the question is a clue which means this is the encryption of an ASCII sentence so it will be made up of number of 48-123 and 32 for space so any number we take two digit at a time if it starts with any number other than 1 and take three digits if it starts with any number that starts with 1 on decoding by finding the corresponding ASCII character,we will get

Y3Nyd29kaGsgIGVhIGFvZm50IHlvaHRqa3ByIHUgZWV0Y3M= 

It is clear that it is base64 because of the '=' which is used as padding.On Decoding this we get

csrwodhk  ea aofnt yohtjkpr u eetcs

from the look of jumbled sentences it is clear that it is a transportation cipher but what is the key ?
The length of this which is 35 the possible rows and colums of key are
(35,1)  (1,35)  Surely not the case  
(18,2)  (2,18)  
(12,3)  (3,12)  
(9,4)   (4,9)
(7,5)   (5,7)

For rest of the cases brute force as the set of keys possible is very small and limited

Finally we will get the flag

jack sparrow found the key to chest
