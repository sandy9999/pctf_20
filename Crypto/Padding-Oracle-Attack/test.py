#!/usr/bin/env python
# -*- coding: utf-8 -*-

import random
import sys
from Crypto.Cipher import AES
from base64 import b64encode,b64decode

BLOCK_SIZE = 16  # bytes
INIT_VEC = 'This is an IV456'  
EXAMPLE_TEXT = """pctf{fl@gs_@re_not_host3d_th3y_@re_c@ptur3d}"""

class InvalidPadding(Exception):
    pass

def blockify(text, block_size=BLOCK_SIZE):
    return [text[i:i+block_size] for i in range(0, len(text), block_size)]

def validate_padding(padded_text):
    return all([n == padded_text[-1] for n in padded_text[-ord(padded_text[-1]):]])

def pkcs7_pad(text):
    length = BLOCK_SIZE - (len(text) % BLOCK_SIZE)
    text += chr(length) * length
    return text

def pkcs7_depad(text):
    if not validate_padding(text):
        raise InvalidPadding()
    return text[:-ord(text[-1])]

def encrypt(plaintext, key, init_vec):
    cipher = AES.new(key, AES.MODE_CBC, init_vec)
    padded_text = pkcs7_pad(plaintext)
    ciphertext = cipher.encrypt(padded_text)
    return ciphertext

def decrypt(ciphertext, key, init_vec):
    cipher = AES.new(key, AES.MODE_CBC, init_vec)
    padded_text = cipher.decrypt(ciphertext)
    try:
        plaintext = pkcs7_depad(padded_text)
    except:
        print "Not happening padding error!"
    return plaintext

def numberify(characters):
    return map(lambda x: ord(x), characters)

def stringify(numbers):
    return "".join(map(lambda x: chr(x), numbers))

if __name__ == "__main__":
    my_key = 'this is a secret'
    IV = numberify(INIT_VEC)
    ciphertext = encrypt(EXAMPLE_TEXT, my_key, INIT_VEC)
    print ciphertext
    print b64encode(ciphertext)

    var1=stringify([1,2,3,4,5,6,7,8,9,10,6,6,6,6,6,6])
    print b64encode(encrypt(var1, my_key, INIT_VEC))

    
