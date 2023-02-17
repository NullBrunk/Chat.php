<div align="center">
  
# Chat
![webchat](https://user-images.githubusercontent.com/125673909/219771897-f0eb2551-932f-40db-8924-9d56f896d725.png)

  
</div>


# Installation

go to /var/www/html OR /srv/http
```bash
git clone https://github.com/A-na-s/Chat
mv Chat/* .
rm -r Chat
```

Copy/paste this on MariaDB:

```sql
CREATE DATABASE webchat;
USE webchat;

CREATE TABLE users(
  `id` INT AUTO_INCREMENT,
  `username` VARCHAR(30) NOT NULL UNIQUE,
  `password` VARCHAR(75) NOT NULL,
  `isadmin` BOOL DEFAULT 0,
  
  PRIMARY KEY(`id`)
);

CREATE TABLE chat(
  `id` INT AUTO_INCREMENT,
  `author` VARCHAR(30) NOT NULL,
  `msg` TEXT NOT NULL,
  `icon` VARCHAR(40),
  
  PRIMARY KEY(`id`)
);
```
Update the includes/db-config.php file, put your hostname your username and your password.
