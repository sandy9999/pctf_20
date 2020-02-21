echo "To view the Flag u should be root user userid:350 groupid:123"
printf "Enter the secret key : "
read msg
python -u index.py $msg
