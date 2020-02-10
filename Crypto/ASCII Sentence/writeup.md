```100711121149972741021008657108908882106995078558951781211005057107977111610288508657997190104885070118901095348885110811897728161```

The name of the question is a clue which means this is the encryption of an ASCII sentence so it will be made up of number of 48-123 and 32 for space so any number we take two digit at a time if it starts with any number other than 1 and take three digits if it starts with any number that starts with 1 on decoding by finding the corresponding ASCII character,we will get

```dGprcHJfdV9lZXRjc2N7Y3Nyd29kaGtfX2V9cGZhX2FvZm50X3lvaHQ=```

It is clear that it is base64 because of the '=' which is used as padding.On Decoding this we get

```tjkpr_u_eetcsc{csrwodhk__e}pfa_aofnt_yoht```

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

```pctf{jack_sparrow_found_the_key_to_chest}```
