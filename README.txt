Launching the applications (on Windows):
1) Download XAMPP: https://www.apachefriends.org/hu/index.html
2) Launch the XAMPP Control Panel and see it there is a problem or not
    --> If the default MySQL Port (3306) is taken:
        --> Click Config, ini.php and write the port to some unused one, for example: 3307
        --> If still not working, just click Services, Search for MySQL and kill the process
3) Unzip the file (from the email, or from the github link I will write down)
4) Rename the folder to something for example: PHP_MVC_Example
5) Move the folder to your htdocs dorectory of your xampp directory of your drive (default is C:)
6) Launch the XAMPP Control Panel and start Apache and MySQL
7) Go to http://localhost/phpmyadmin/ in your broser (I used Chrome)
8) Go to SQL and Copy the contents of the sql/init.sql file and execute the code
9) Refresh and you should see the advertisements and users table in the php_mvc_example database
10) Go to http://localhost/PHP_MVC_Example/index.php (or maybe if you rename the folder then substitute it to the PHP_MVC_Example part of the URL)
11) Done, the applications is running