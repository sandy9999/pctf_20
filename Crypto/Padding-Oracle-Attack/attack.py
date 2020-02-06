from util import xor
from aes_cbc import AES_CBC
import itertools as it

aes_cbc=AES_CBC(b'this is a secret',b'call me a doctor')

cipher=b'\x12D\xc4\x83\xb5\x92\xe0\x9f]I~\x12\xdb\x8f\xce\xdd2\xe8J1\xce\xcfV\x92,\xed\xdc\x85\xcc\xd0:F'
cipher=bytearray(cipher)
cipher=b'call me a doctor'+cipher

def split_blocks(data):
    length=len(data)
    blocks=[]
    for i in range(int(length/16)):
        blocks.append(data[i*16:(i+1)*16])
        
    return blocks

def find_bytes(blocks): #prevBlock and nextBlock,nextBlock is one we decode
    c_prime=bytearray(blocks[0])

    plaintext_bytes=bytearray([0 for i in range(16)])
    
    for i in range(16):      
        expected_padding=bytearray([0 for a in range(16-i)]+[(i+1) for b in range(i)])
        c_prime=xor(xor(expected_padding,plaintext_bytes),blocks[0])
        print(c_prime)

        for byte in it.chain(range(blocks[0][15-i]+1,256),range(0,blocks[0][15-i]+1)):
            c_prime[15-i]=byte
            to_test=bytes(c_prime+blocks[1])
            try:
                aes_cbc.decrypt(to_test)
                plaintext_bytes[15-i]=(byte^(i+1)^blocks[0][15-i])
            except:
                pass
    
    return plaintext_bytes

def find_plaintext(ciphertext):
    ciphertext=bytearray(ciphertext)
    blocks=split_blocks(ciphertext)

    plaintext=b""

    for i in range(len(blocks)-1):
        plaintext+=find_bytes(blocks[i:i+2])
    
    print(plaintext)

find_plaintext(cipher)



