1. Finding the API authorization method:
    The API server is an unknown service to authorise users for login/registration. 
    Lets try a random registration.
    We have got a token, lets try decoding it.
    It has three parts divided by "." character. Probably it has to be JWT.
    Decoding it using JWT structure, we have got the body of the response.

2. Breaking down the algorithm:
    Inspecting the response it is clear that they have used RSA encryption keys to sign and verify the keys.
    So the tokens are signed by Private key and verified by public key. But it is interesting to know that JWT also allows HSA algorithm for authorization.

3. Lets try to go-around the verification part:
    So as mentioned above publickey is used in RSA256 algorithm for verification and privatekey for signing a token. A jwt encode function would take three arguements.
      * Payload
      * A secret key
      * algorithm used to encode (as an option)
    In rsa case our secret key is a private key.
    A jwt decode function would take two arguements.
      * Token
      * A secret key
    In rsa case our secret key is a public key and algorithm which was used to encode can be found in the header.

    Here is the trick. What if the header is altered other than RSA?
      Suppose lets say we are changing to HSA. The verification code would try to verify the token using public key in HSA algorithm. I know it would be a failure, but thats not the point. 
      HSA algoithm uses same key for both signing and verification. 
      If we manage to find the public keyy we could sign our own tokens using it in HSA algorithm which would pass the verification in server too. Yea...

      We could find the publickey of the server using ssl or a python script. 
      <br/>
      <a href="publickey.py">publickey.py</a>
      <br/>
      Sign your own JWT token using a script. 
      <a href="solution.php">solution.php</a>

      Pass the generated token using postman to recieve the flag

    

