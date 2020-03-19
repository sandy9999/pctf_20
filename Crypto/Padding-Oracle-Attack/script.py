from test import pkcs7_depad,decrypt,numberify,stringify
from base64 import b64decode
import sys

BLOCK_SIZE = 16  # bytes
INIT_VEC = 'This is an IV456'  
EXAMPLE_TEXT = """pctf{fl@gs_@re_not_host3d_th3y_@re_c@ptur3d}"""
my_key = 'this is a secret'

cipher=b64decode(sys.argv[1])
iv=b64decode(sys.argv[2])
print iv

try:
    cleartext=decrypt(cipher, my_key, iv)
    if cleartext!=EXAMPLE_TEXT:
        print "Cipher Error!"
    else:
        print "Correct Cipher!"
except Exception as e:
    print e
    print "Padding Error!"


    
