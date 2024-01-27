<div align="center">
   
# PHPChat  

https://webchat-1.000webhostapp.com/
 
<br/> 
 
![GitHub top language](https://img.shields.io/github/languages/top/NullBrunk/PHPChat?style=for-the-badge)
![GitHub commit activity](https://img.shields.io/github/commit-activity/m/NullBrunk/PHPChat?style=for-the-badge)
![repo size](https://img.shields.io/github/repo-size/NullBrunk/PHPChat?style=for-the-badge)

![simplescreenrecorder-2023-09-02_16 11 39 (online-video-cutter com)](https://github.com/NullBrunk/PHPChat/assets/125673909/b14b05ed-f002-489e-b568-db3ab0a5cb9b)
</div>

# 🔐 Login / Signup
![logsig](https://github.com/NullBrunk/PHPChat/assets/125673909/ea198379-ee30-421b-8bf9-d4c9a8c84274)

# ⚙️ Settings page
![simplescreenrecorder-2023-09-02_16 38 36 (online-video-cutter com)](https://github.com/NullBrunk/PHPChat/assets/125673909/672b8596-6146-4404-b13e-da1b2b09927a)

# 📈 Stats page 
![image](https://github.com/NullBrunk/PHPChat/assets/125673909/5a893e6b-773b-4707-b018-0451eef32524)


# 🔎 About page
![image](https://github.com/NullBrunk/PHPChat/assets/125673909/3e59c72d-0ccd-4fbf-ad60-e1d4d3c2d5fa)



# ⚒️ Installation

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
Update the /app/includes/db.php file, put your hostname your username and your password.
