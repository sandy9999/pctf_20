# Pragyan CTF 2020: Up can be Down.


> Find and submit the {flag}
>
> [./file/mrRobot.jpg](mrRobot.jpg)

## Write-up
Given a simple file-

1. If we try to extract data from the image using `binwalk` and `steghide` we get our outputs as :
 
```bash
$ binwalk -e mrRobot.jpg 

DECIMAL       HEXADECIMAL     DESCRIPTION
--------------------------------------------------------------------------------
0             0x0             JPEG image data, JFIF standard 1.01
30            0x1E            TIFF image data, big-endian, offset of first image directory: 8

```
so it has hidden data but is nothing extracted so we do `steghide`
And we get-

```bash
$ steghide extract -sf  mrRobot.jpg
Enter passphrase:
```
So, we actually need a passphrase to do that.

2. Using `exiftool` on the file we get the following output:

```bash
$ exiftool mrRobot.jpg 
ExifTool Version Number         : 11.70
File Name                       : mrRobot.jpg
Directory                       : .
File Size                       : 857 kB
File Modification Date/Time     : 2020:01:08 01:57:42+05:30
File Access Date/Time           : 2020:01:08 01:57:42+05:30
File Inode Change Date/Time     : 2020:01:08 01:57:42+05:30
File Permissions                : rw-r--r--
File Type                       : JPEG
File Type Extension             : jpg
MIME Type                       : image/jpeg
JFIF Version                    : 1.01
Exif Byte Order                 : Big-endian (Motorola, MM)
X Resolution                    : 28
Y Resolution                    : 28
Resolution Unit                 : cm
Artist                          : 6ab29f5d003984a335cd3f79781c04e51
Y Cb Cr Positioning             : Centered
XMP Toolkit                     : Image::ExifTool 11.70
Format                          : 44de3ed43a38bbf73a9e4d5ea79f0b0
Comment                         : U0hBLTI1Ng==
Image Width                     : 2560
Image Height                    : 1920
Encoding Process                : Baseline DCT, Huffman coding
Bits Per Sample                 : 8
Color Components                : 3
Y Cb Cr Sub Sampling            : YCbCr4:4:4 (1 1)
Image Size                      : 2560x1920
Megapixels                      : 4.9

```
Now here we find a base64 value inside comment tag `U0hBLTI1Ng==`, which when decoded give SHA-256,

Now we see 2 encrypted values in the Artist and Format tags which combined will give output:

* 6ab29f5d003984a335cd3f79781c04e51
* 44de3ed43a38bbf73a9e4d5ea79f0b0

Now these are clearly encrypted. If we decrypt these using basic SHA256 Decryption , we get invalid output for both.
Now let's combine them and check again

* 6ab29f5d003984a335cd3f79781c04e5144de3ed43a38bbf73a9e4d5ea79f0b0

Again is gives invalid answer
But as the question says "up can be down", just reverse the order and try-

* 44de3ed43a38bbf73a9e4d5ea79f0b06ab29f5d003984a335cd3f79781c04e51

Finally, we get a valid output "doraemon", which is the passphrase we needed.

3. So we use `steghide` to extract additional hidden data in the picture: with the obtained passphrase i.e., "doraemon", we get 


```bash
$ steghide extract -sf mrRobot.jpg
Enter Passphrase: doraemon
wrote extracted data to "flag.txt"
$ cat flag.txt
Congrats! This was way too wasy :P

This is the key:

s0rry_6ut_1_@m_n0t_@_r060t
```

The flag is `s0rry_6ut_1_@m_n0t_@_r060t`.

