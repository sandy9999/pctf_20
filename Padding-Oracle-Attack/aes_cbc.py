import base64
import os
from Crypto.Cipher import AES
from util import xor
from base64 import b64encode,b64decode

class AES_CBC(object):
    def __init__(self,key=os.urandom(16),IV=os.urandom(16)):
        self.key=key
        self.IV=IV
        self._cipher=AES.new(key)

    def _split_blocks(self,data):
        length=len(data)
        blocks=[]
        for i in range(int(length/16)):
            blocks.append(data[i*16:(i+1)*16])

        return blocks

    def _add_padding(self,data):
        padding=16-(len(data)%16)

        return data+bytearray([padding for i in range(padding)])

    def _check_and_strip_padding(self,data):
        padding=data[-1]
        if padding == 0 or padding > 16:
            raise ValueError("Incorrect Paddding")
        for byte in data[len(data)-padding:]:
            if byte != padding:
                raise ValueError("Incorrect Padding")

        return data[:len(data)-padding]

    def encrypt(self,plaintext):
        plaintext=self._add_padding(bytearray(plaintext))
        plaintext_blocks=self._split_blocks(plaintext)

        ciphertext_blocks=[]
        for i,block in enumerate(plaintext_blocks):
            if i==0:
                ciphertext_blocks.append(self._cipher.encrypt(bytes(xor(self.IV,block))))
            else:
                ciphertext_blocks.append(self._cipher.encrypt(bytes(xor(ciphertext_blocks[i-1],block))))

        return b"".join(ciphertext_blocks)

    def decrypt(self,ciphertext):
        ciphertext_blocks=self._split_blocks(ciphertext)

        plaintext_blocks=[]
        for i,block in enumerate(ciphertext_blocks):
            if i==0:
                plaintext_blocks.append(bytes(xor(self._cipher.decrypt(block),self.IV)))
            else:
                plaintext_blocks.append(bytes(xor(self._cipher.decrypt(block),ciphertext_blocks[i-1])))

        return self._check_and_strip_padding(b"".join(plaintext_blocks))

if __name__ == "__main__":
    aes=AES_CBC(b'this is a secret',b'call me a doctor')
    encrypted=aes.encrypt(b"this is padding oracle attack")
    print(encrypted)
    decrypted=aes.decrypt(encrypted)
    print(decrypted)
    print(len(decrypted))



