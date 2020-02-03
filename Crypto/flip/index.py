from cryptography.hazmat.primitives.ciphers import Cipher,algorithms,modes
from cryptography.hazmat.primitives import padding
from cryptography.hazmat.backends import default_backend
from binascii import hexlify,unhexlify

print("To view the Flag u should be root user userid:350 groupid:123")

data=b'groupid:100@300:userid'
key=b'v\xdd#\\\xfdD\xf97d\xf0\xc3\xff\x93vd\xd0'
IV=b'\r\xaa\xbat\xf3Z\xfe \x98\x81r\xf4h\x0eh\xb8'

print(hexlify(IV).decode("utf-8"))

padder=padding.PKCS7(128).padder() #padder
padded_data=padder.update(data)+padder.finalize() #padded data

unpadder=padding.PKCS7(128).unpadder() #unpadder

IV_new=input('Enter IV : ')
IV=unhexlify(IV_new)

cipher=Cipher(algorithms.AES(key),modes.CBC(IV),default_backend()) 
decryptor=cipher.decryptor() #decryptor function

ct=b'\xe0\x81\xc6\xc7\xae\xb5\x0cM\x08\x0ci\xc2Qs\x95\xb2\xc3r\t\xa0\xbd\n]\xa1\xb2fN9\xc3NK\x85' #encrypted text
dt=decryptor.update(ct)+decryptor.finalize() #decrypted text
final_result=(unpadder.update(dt)+unpadder.finalize()) #decrypted the encrypted text

result=final_result.decode("utf-8")

print(f"userid:{result[12:15]}")
print(f"groupid:{result[8:11]}")

if(result[12:15]==350 and result[8:11]==123):
    print("pctf{this_is_flag}")


