**********
Database Configuration
**********
- `mysql -u root -p`
- `mysql> create database workshop`
- `mysql> create user 'workshop'@'localhost' identified by 'workshop'`
- `mysql> grant all privileges on workshop.* to 'workshop'@'localhost' with grant option'`
- `mysql> exit`
- `mysql -u root -p workshop < workshop.sql`
