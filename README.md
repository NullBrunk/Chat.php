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
![image](https://user-images.githubusercontent.com/125673909/233104552-cc96740a-f7de-424c-8138-164b3c7a38b0.png)

# About page
![image](https://user-images.githubusercontent.com/125673909/233104696-55728e2e-e650-4276-8721-8256445193d2.png)


# Signup page
![image](https://user-images.githubusercontent.com/125673909/233086729-9402d354-e00d-4fc4-81ca-e69d7126858c.png)


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
