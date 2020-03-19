# Pragyan CTF 2020: I am not a poker.


> Find and submit the flag.
>

## Write-up

1.You are given 2 files, out of which one is a disk image file "challenge.iso" and the other one is just a normal image with a keyboard, 2 dices and a piece of paper with something written over it.



The disk image asks for a passphrase because it is encrypted. Use the command `file challenge.iso` and it will show that it is a Luks encrypted file.

```bash
$ file challenge.iso 
challenge.iso: LUKS encrypted file, ver 2 [, , sha256] UUID: dbcd5b07-0401-486e-bfd4-41bccb539c3a
```
2. Now look at the image given with it, it has a paper with some 5 digits numbers wirtten over it and a phrase "ARE YOU AN EFF MEMBER?", which is not the password.
>![THE SECRET LENGTH IS 38.jpg](./file/THE SECRET LENGTH IS 38.jpg)

But notice it carefully, it also has a pair of dice and the statement written says something about EFF. So basically it's a series of numbers taken from EFF dice-generated passphrases https://www.eff.org/dice .
Decoding the code you will find the passphrase "a big black bear sat on a big black rug".
 
3. Now use a tool cryptsetup used to work over a luks file. This will help you to open the luks container.

```bash
$ sudo cryptsetup luksOpen challenge.iso encVolume
Enter passphrase for challenge.iso: 

```
Enter the passphrase and it will open the container inside the folder `/dev/mapper/encVolume`. Using `fdisk -l` will show you something like- 

```
Disk /dev/mapper/encVolume: 34 MiB, 35651584 bytes, 69632 sectors
Units: sectors of 1 * 512 = 512 bytes
Sector size (logical/physical): 512 bytes / 512 bytes
I/O size (minimum/optimal): 512 bytes / 512 bytes
```

4. Now make an empty directory somewhere and mount the conntainer inside the directory to find what's inside of it.

```bash
$ mkdir temp
$ sudo mount /dev/mapper/encVolume3 ~/temp
$ cd ~/temp
```
You will find two files inside it. One of these files will have some encrypted code and other one has a small script written in golang.
It is a basic script which is just taking the flag string, xoring the number 1 greater the ascii value of each character with a secret length, which is 38  as given by the image file, and encrypting it using base64.
Just reverse the algorithm over the encrypted text and you will find the flag-

`p_ctf{d!ce_!$_n01_@lw@y$_used_f0r_p0ker}`
