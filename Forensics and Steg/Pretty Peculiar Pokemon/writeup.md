# Pragyan CTF 2020: Pretty Peculiar Pokemon.


> Find and submit the {flag}
>
> ![Challenge.tar.xz](./File/Challenge.tar.xz)

## Write-up
Given a simple file-

1. You are given a simple compressed file `Challenge.tar.xz`. Extract it and you will get a folder with a file and a folder in it. Open the folder and you will find hundreds of pokemon images inside it. You can't simply find the correct pokemon image to extract data from it. You need to search for the correct pokemon in the list.
The file given `pokemondata.pdf` is in pdf format and is password protected. Using john the ripper with rockyou.txt won't work. The password is given inside the question itself i.e., "timewaste". Use it and open the file. It's a pretty simple file with random data inside it. You will find a piece of encrypted string `bGV0bWVzbGVlcA==`
which when decoded will give you a string `letmesleep`. 

So this isn't the right flag. But it may be used somewhere else.

2. Now as given in the question, the pokemon is hidden somewhere, so we do `ls -a` - and we get a hidden folder inside the `pokemon` folder named `.pikachu`.
Open it and you will find another pdf file named `may.pdf` which is another password protected file. The password `letmesleep` won't work here so, You can use john the ripper again with rockyou.txt and it will give you the actual password that is `pikachu` which is clearly mentioned inside the name of the folder itself.
Open the file, you will find a paragraph with a small random string SHA-256 encrypted which is just a diversion. The pokemon is mentioned in the paragraph itself `jigglypuff` and that is your correct pokemon.

3. Now find the file `jigglypuff.png` inside the pokemon folder and use pngcheck over it.

```bash
$ pngcheck -v jigglypuff.png 
File: jigglypuff.png (69119 bytes)
  this is neither a PNG or JNG image nor a MNG stream
ERRORS DETECTED in jigglypuff.png
```

That means this file may have some errors. Use steghide over it to extract the flag, but you will need the password to do that. You found a string in the earlier `letmesleep` use that and you will find a file `galf.txt`.

```bash
$ steghide extract -sf jigglypuff.png 
Enter passphrase: 
wrote extracted data to "galf.txt".
```

4. Print out the content inside the txt file and you will get the actual flag

```bash
$ cat galf.txt 
Congrats you found the hidden flag

p_ctf{j!gglypuff_w@n1$_10_$leep_n0w}
```

Your flag is `p_ctf{j!gglypuff_w@n1$_10_$leep_n0w}`.




P.S.- Jigglypuff is really a peculiar pokemon.


