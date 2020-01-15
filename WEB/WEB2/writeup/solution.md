Getting the credentials:
  - We know the username and on a closer inspectionn, we could see some pattern being followed in 
    registration process.
  - Using the pattern brute force would be much easier to find the password.
     On condition : 
        if  password is wrong : we get notified password is wrong
        else : The server responds saying  "Please use your authorised device"
               Which means the password we have just found is correct

Everythings looks to be easy ?
Maybe not.....

After getting credentials:
  - The server responds saying : "Please use your authorised device".Woaahhh ! wait I was not ready     for this.....
    Not an authorised device ? 
        So the site could differentiate one device/browser from another.
        Most common technique to identify the User`s device/browser is through browserfingerprint.

  - On close inspection : We could see they have used some fingerprintjs2. Eureka!
        Fingerprintjs2 is an open source module used to find a browser`s unique fingerprint.
        They manage to get some information about the device and browser and creating a hash using it which then is sent as a post request.
  - The final hash depends on the integers present in the password.
        So now we know the elements in the components that are used for the hash which makes the hash crackable.

Finding the Admin`s system details:
  - Analysing the captured traffic - the admin has used his opera browser with language set as en-GB.
    It also has an image denoting his studio.
  - The picture given to us was taken in the Admin`s home. Checking EXIF data we could find it is in    Asia/Calcutta.
  - The picture was in the highest resolution which can be viewed in his laptop.
    And again Resolution could be found in EXIF data. 
  - colorDepth :  8-bit, 16-bit, 24-bit, 32-bit are the only colorDepth possible in today`s world.
    
    4 colorDepth possibilities
    Now you will get the admin`s fingerprint.
   
          
<!-- pattern of the below numbers -->
<!-- choose userAgent language colorDepth timezone localstorage sessionstorage adBlock -->
<!-- 0 1 2 3 4() 6 9 16 -->

<!-- Your Hash: f7d2ea0c46c8e3ca295dbde7a6f51c5d -->
<!-- f9d2ea0c46ce3ca295dbde10a6f51c3d -->
<!-- f9d2ea0c46ce3ca295dbdea6f51c3d -->
<!-- numbers used 9, 2, 0, 3, 10, 6, 3 -->
<!-- Your String: this is good -->

<!-- final string before hash -->
<!-- Asia/Calcutta,en-GB,Mozilla/5.0(X11;Linuxx86_64)AppleWebKit/537.36(KHTML,likeGecko)Chrome/77.0.3865.120Safari/537.36OPR/64.0.3417.92,24,true,720,1280,24 -->
<!-- 1fd8702e61648fe5837a3a5c3200d642 -->

<!-- CruSieg  -->