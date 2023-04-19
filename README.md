<div align="center">
  
# PHPChat

<br/>

![GitHub top language](https://img.shields.io/github/languages/top/NullBrunk/PHPChat?style=for-the-badge)
![GitHub commit activity](https://img.shields.io/github/commit-activity/m/NullBrunk/PHPChat?style=for-the-badge)
![repo size](https://img.shields.io/github/repo-size/NullBrunk/PHPChat?style=for-the-badge)


![webchat](https://user-images.githubusercontent.com/125673909/219771897-f0eb2551-932f-40db-8924-9d56f896d725.png)

# Chat
![image](https://user-images.githubusercontent.com/125673909/233087679-196e4f1e-285b-4e73-a52e-00074620cf6b.png)

# Stats page
![image](https://user-images.githubusercontent.com/125673909/233104552-cc96740a-f7de-424c-8138-164b3c7a38b0.png)

# About page
![image](https://user-images.githubusercontent.com/125673909/233104696-55728e2e-e650-4276-8721-8256445193d2.png)


# Signup page
![image](https://user-images.githubusercontent.com/125673909/233086729-9402d354-e00d-4fc4-81ca-e69d7126858c.png)


# Login Page
![image](https://user-images.githubusercontent.com/125673909/233081386-8e317971-8dc0-41bb-8992-d6d268aabf65.png)

  
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
