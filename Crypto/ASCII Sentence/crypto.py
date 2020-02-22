from cryptography.hazmat.primitives.ciphers import Cipher,algorithms,modes
import base64

statement="pctf{jack_sparrow_found_the_key_to_chest}"

print(len(statement))

def split_len(seq, length):
    return [seq[i:i + length] for i in range(0, len(seq), length)]

def encode(key, plaintext):

    order = {
        int(val): num for num, val in enumerate(key)
    }

    ciphertext = ''
    for index in sorted(order.keys()):
        for part in split_len(plaintext, len(key)):
            try:
                ciphertext += part[order[index]]
            except IndexError:
                continue

    return ciphertext
    
cipher_1=encode('321',statement)
print(cipher_1)

cipher2=base64.b64encode(cipher_1.encode("utf-8"))
print(cipher2)

list1=[]
for x in cipher2.decode('utf-8'):
    list1.append(str(ord(x)))
    print(str(ord(x)))

print("".join(list1))
    
















