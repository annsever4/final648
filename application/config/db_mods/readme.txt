//
//	Date:	 12/17/16
//	Author:  Ivan Marchenko
//

This directory will contain files related to db schema changes....

If you are using your own db instance, then every time you sync with latest repo changes, 
you need to observe if any new files got introduced into "db_mods" directory. 
If so, please run those files to bring your schema in sync with latest code base.

For schema mods, we add new files in this format: 

schema_migrate_$N.sql // where $N is a number in increasing sequence.




Also, it is good practice (done nearly everywhere) to keep "sample data" in here as well. 

For example, every time data needs to be added / altered... we add new files into this dir, such as: 

dasta_migrate_5.sql 
dasta_migrate_6.sql 
dasta_migrate_7.sql 
... and so on....

Idea is every time you see new stuff introduced - you run it. 

