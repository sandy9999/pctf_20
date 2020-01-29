from binascii import unhexlify
import os

def xor(string1,string2):
    ba1=bytearray(string1)
    ba2=bytearray(string2)
    list1=[]
    for i in range(len(ba1)):
        list1.append(ba1[i]^ba2[i])
    return bytearray(list1)

if __name__ == "__main__":
    print((xor(os.urandom(16),os.urandom(16)))) 


