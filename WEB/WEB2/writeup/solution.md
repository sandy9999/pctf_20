Getting the credentials:
  - We know the username and on a closer inspection, we could see some pattern being      followed in registration process. For example:
    UsernameX - where x is an integer

  - Using the pattern, brute force would be much easier to find the password.
     On condition : 
        if  password is wrong : we get notified password is wrong
        else : The server responds saying  "Please use your authorised device"
               Which means the password we have just found is correct

        Eg: CruSieg2020 : would result in alert("Wrong Username") and an GET['error'] is been set to indicate no-user

Everythings looks to be easy ?
Maybe not.....

After getting credentials:
  - The server responds saying : alert("Please use your authorised device").Woaahhh !     wait I was not ready for this.....

    Not an authorised device ? 
        So the site could differentiate one device/browser from another.
        Most common technique to identify the User`s device/browser is through browserfingerprint.

  - On close inspection : We could see they have used some fingerprintjs2. Eureka!
    <br />
    <img src="images/ss1.png" width="300" height="300">

        Fingerprintjs2 is an open source module used to find a browser`s unique fingerprint.
        They manage to get some information about the device and browser and creating a hash using it which then is sent as a post request.
  - Components of fingerprintjs2 has the value: Use
        if (window.requestIdleCallback) {   
           requestIdleCallback(function () {       
               Fingerprint2.get(function (components) {  
                   console.log(components)  ;   
                    values = components.map(function (component) { return component.value })     
                })   
           }) 
        } 
    The same code in frontend:
    <br />
    <img src="images/ss2.png" width="300" height="300">
    
  - The final hash depends on the integers present in the password.
        So now we know the elements in the components that are used for the hash which makes the hash crackable.

Finding the Admin`s system details:
  - Analysing the json object :  UserAgent tag - the admin has used his opera browser.
    It has a decoded string which should be base64. 
    Use : window.location.href = 'data:application/octet-stream;base64,' + img; in console.log() 
    Decoding it we get an image named homesweethome same as the title - denoting his studio.
  - The picture given to us was taken in the Admin`s home. Checking EXIF data we could find it is in    Asia/Calcutta.
  - The picture was in the highest resolution which can be viewed in his laptop.
    And again Resolution could be found in EXIF data. 
  - colorDepth :  8-bit, 16-bit, 24-bit, 32-bit are the only colorDepth possible in today`s world.
    
    4 colorDepth possibilities
  
  So now the string before hash looks something like :
  24,Mozilla/5.0(X11;Linuxx86_64)AppleWebKit/537.36(KHTML,likeGecko)Chrome/7.0.3865.120Safari/537.36 OPR/64.0.3417.92,Asia/Calcutta,720,1280
  
  Now you will get the admin`s fingerprint.

  f2664adf0d9a05d17cec8aee84e6502c 
  
          
