Clue: "Kimi no Na wa" meaning "Your name" in japanese(movie).
So the question is manipulating webapp using the username field.
Probably the first thing that comes to our mind is "SQL injections".
1. Attempting some SQL injections in login pages seems to be not successful.
   So lets register a new user. The home page is like a email page having out draft messages.
   And we could try some sql injections here to fetch other user`s draft messages.
2. Lets find number fields returned by the main query by:
   ' SELECT NULL; -username by which we know only one field is returned.
   Then find the column name in table_Schema and
   Registering a new user named : "kimi ' or '1' = '1' UNION SELECT message FROM kimimsg -- 9'  
     => gives out all the draft messages 