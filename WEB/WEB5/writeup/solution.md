1. Basic login shows up the homepage which has some kind of notes which was stored by us
   These are fetched based on the GET request in the URL which has our name by default.
   For now lets register a user named "hello" for simplicity
2. Lets check whether it is vulnerable to SQL injections by executing simple ' ORDER BY 1 query
   Yes we are not facing any issues which shows that this page is vulnerable to sql injections
3. First of all we need to find the number of fields returned by the query.
   Using the common ORDER BY $x ($x - an integer) we can find that it return 2 fields and luckily both are characters.
4. lets find the tablename containing all the locations of hideouts
   SQL INJECTION on table:sys.schema_table_statistics
   NAME=hello' UNION SELECT table_name,NULL FROM sys.schema_table_statistics;
   lists out the tablenames. pandoralocations seems to the one.
 
5. Unluckily pandoralocations and msg query dont have same number of returning fields. So we       can use simple "SELECT * FROM pandoralocations". We need to find the column names.
6. hello'%20 UNION SELECT COLUMN_NAME ,NULL FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME =     N'pandoralocations'-- 9 
   The above query would give us the column name with which further sql injections should be easier.
   

UNION SELECT base,latitude FROM locations-- 9

We get the flag: p_ctf{t1ll_my_l45t_bre47h_p4ndor4_4ever}