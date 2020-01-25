```100711121149972731031008366108908882106995078558951781211005057107977111510373718657997190104737170118901095348737210811897728161```

The name of the question is a clue which means this is the encryption of an ASCII sentence so it will be made up of number of 48-123 and 32 for space so any number we take two digit at a time if it starts with any number other than 1 and take three digits if it starts with any number that starts with 1 on decoding by finding the corresponding ASCII character,we will get

```dGprcHIgdSBlZXRjc2N7Y3Nyd29kaGsgIGV9cGZhIGFvZm50IHlvaHQ=```

It is clear that it is base64 because of the '=' which is used as padding.On Decoding this we get

```tjkpr u eetcsc{csrwodhk  e}pfa aofnt yoht```

from the look of jumbled sentences it is clear that it is a transportation cipher but what is the key ?
The length of this which is 41 the possible rows and colums of matrix are
(41,1)  (1,41)  Surely not the case  
(21,2)  (2,21)  
(14,3)  (3,14)  
(11,4)   (4,11)
(9,5)   (5,9)
(7,6)   (6,7)

For rest of the cases brute force as the set of keys possible is very small and limited

Finally we will get the flag

```pctf{jack sparrow found the key to chest}```
