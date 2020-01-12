username in website as well as in the server is same.
So lets look into the list of all users in the server.  

REMOTE FILE INCLUSION:
 Using pageContent class`s destructor. 
 get request for footer can be an object. allowing remote code execution.
 Object can be built using solution.php (in writeup)
 execute code to find username in server {user named : pragyan{X} x- an integer }.
 Now we know the X value.

DATABASE:
 Login process has used "strcmp" in password verification step, but the username is passed in a prepared statement.
 so make a POST:password  an array in login page with correct username.