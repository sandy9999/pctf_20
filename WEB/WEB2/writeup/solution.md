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
  - Components of fingerprintjs2 has the value: Use
        if (window.requestIdleCallback) {   
           requestIdleCallback(function () {       
               Fingerprint2.get(function (components) {  
                   console.log(components)  ;   
                    values = components.map(function (component) { return component.value })     
                })   
           }) 
        } 
    The same code in frontend
    
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
    Now you will get the admin`s fingerprint.
   
          
