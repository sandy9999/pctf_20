from base64 import b64decode,b64encode
from test import decrypt

BLOCK_SIZE = 16  
INIT_VEC = 'This is an IV456' # this will be given away
my_key = 'this is a secret' # !important this won't be given away

ciphertext="TE2GVo0jKwXNdk+xheq5m3HlKf8EKeqDh6RA3R3y8eSs5XS2TMt04b6GJ+aabeSz"

def numberify(characters):
    return map(lambda x: ord(x), characters)

def blockify(text, block_size=BLOCK_SIZE):
    return [text[i:i+block_size] for i in range(0, len(text), block_size)]

def stringify(numbers):
    return "".join(map(lambda x: chr(x), numbers))

IV = numberify(INIT_VEC)
blocks = blockify(numberify(b64decode(ciphertext)))

cleartext = []
for block_num, (c1, c2) in enumerate(zip([IV]+blocks, blocks)):
    i2 = [0] * 16
    p2 = [0] * 16
    for i in xrange(15,-1,-1):
        for b in xrange(0,256):
            prefix = c1[:i]
            pad_byte = (BLOCK_SIZE-i)
            suffix = [pad_byte ^ val for val in i2[i+1:]]
            evil_c1 = prefix + [b] + suffix
            try:
                decrypt(stringify(c2), my_key, stringify(evil_c1)) # this will be taken care by the oracle
            except:
                pass
            else:
                i2[i] = evil_c1[i] ^ pad_byte
                p2[i] = c1[i] ^ i2[i]
                break
    cleartext+=p2

print stringify(cleartext)
