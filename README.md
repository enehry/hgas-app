# HGAS-APPLICATION
**An online automation system for homeroom guidance excel file**

****
## Installation
#### Install the following packages:

##### 1. XAMPP
>You can visit [XAMPP](https://www.apachefriends.org/download.html) to download the PHP development environment needed to run the website and to create a local server to your computer.

##### 2. Composer
>You can visit [composer](https://getcomposer.org/Composer-Setup.exe) for installation guide.

##### 3. Nodejs
>You can visit [Node.js](https://nodejs.org/en/) and download the version recommended for most users.

#### Run XAMPP Control Panel and add database 'hgasdb'
#### Open terminal in the project application and run the commands
```
composer install
npm install
php artisan migrate
npm run dev
```