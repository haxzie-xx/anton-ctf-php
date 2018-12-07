# ANTON CTF Server [PHP]

This is a simple CTF platform built using PHP. It contains basic features like, adding categories, challenges, leaderboard etc. This is far from perfect, any contributions on improving code quality and features are welcomed.

![dash](https://github.com/haxzie/anton-ctf-php/raw/master/images/Screenshot%20from%202018-12-03%2012-21-00.png)
![admin](https://github.com/haxzie/anton-ctf-php/raw/master/images/Screenshot%20from%202018-12-03%2012-20-09.png)
## SETUP
Clone the repository to your local machine. Hit big green button on the top right to download the project as zip. Extract the contents.  
If you are using windows, u need to install [XAMPP](https://www.apachefriends.org/download.html) You can use the same for linux too, else you gotta setup a [lamp server](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-ubuntu-18-04) in your linux system.

### Windows users
- Copy/Move the extracted files into `c:/xampp/htdocs/anton` and goto `localhost/anton` to check the site live.
- Goto `localhost/phpmyadmin`, sign in and navigate to import tab.
- Click on upload .sql file and browse for the `anton.sql` file in the project's root directory.
- This will setup all the databases and table with sample contents for the project.

### Linux users
If you are using XAMMP on linux, you can follow the same steps above except the htdocs folder will residing in `/opt/lampp/htdocs` either you can copy the extracted project files there or you can create a sym link to the project folder.
eg:
```shell
$ sudo ln -s PATH_OF_YOR_EXTRACTED_FOLDER /opt/lampp/htdocs
```

## Creating an admin user
Sign up as a normal user into the platform. Goto `phpmyadmin` and change the role of the user to admin.
If you are using mysql shell, execute the following query.
```shell
> use anton
> update users set role="admin" where email="YOUR-USER_EMAIL";
```
