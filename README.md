<div align="center">
   
# PHPChat  

https://brunkchat.000webhostapp.com/ 
 
<br/>    
 
![GitHub top language](https://img.shields.io/github/languages/top/NullBrunk/PHPChat?style=for-the-badge)
![GitHub commit activity](https://img.shields.io/github/commit-activity/m/NullBrunk/PHPChat?style=for-the-badge)
![repo size](https://img.shields.io/github/repo-size/NullBrunk/PHPChat?style=for-the-badge)

![dynamicchat](https://github.com/NullBrunk/PHPChat/assets/125673909/5fc7a351-0a00-4e13-82a6-18de78b618ca)


# Login / Signup
![SignupLogin](https://github.com/NullBrunk/PHPChat/assets/125673909/fbab1288-5161-4b22-ab80-765cd07f8e16)

# Stats page 
![image](https://github.com/NullBrunk/PHPChat/assets/125673909/5a893e6b-773b-4707-b018-0451eef32524)


# About page
![image](https://github.com/NullBrunk/PHPChat/assets/125673909/3e59c72d-0ccd-4fbf-ad60-e1d4d3c2d5fa)


</div>


# Installation

go to /var/www/html OR /srv/http
```bash
git clone https://github.com/NullBrunk/PHPChat
mv PHPChat/* .
rm -r Chat
```

Copy/paste this on MariaDB:

```sql
CREATE DATABASE webchat;
USE webchat;

CREATE TABLE users(
  `id` INT AUTO_INCREMENT,
  `username` VARCHAR(30) NOT NULL UNIQUE,
  `password` VARCHAR(130) NOT NULL,
  `isadmin` BOOLEAN DEFAULT 0,
  
  PRIMARY KEY(`id`)
);

CREATE TABLE chat(
  `id` INT AUTO_INCREMENT,
  `author` VARCHAR(30) NOT NULL,
  `msg` TEXT NOT NULL,
  
  PRIMARY KEY(`id`)
);
```
Update the includes/db-config.php file, put your hostname your username and your password.
