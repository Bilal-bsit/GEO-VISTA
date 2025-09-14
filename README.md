## GeoVista (HTML,CSS, JavaScript, JavaQuery, PHP, MySQL, Bootstrap)

A simple tours site for Pakistan’s northern areas (tours, maps, safety tips, reviews, Inquiries, bookings).

## Get started (Local on XAMPP)
Download & install XAMPP (Install it in Empty Folder)
Start Apache and MySQL from XAMPP Control Panel

## Copy the Project
Put the project inside htdocs
C:\xampp\htdocs\geovista

## Database
Create DB (phpMyAdmin or MySQL CLI)
CREATE DATABASE geo_vista CHARACTER SET utf8mb4 COLLATION utf8mb4_general_ci;

# Import Database file
 Use phpMyAdmin → geo_vista → Import → select xampp\htdocs\geo-vista.sql

## Config
 Copy example and set credentials
inc/config.example.php → inc/config.php

# Update in inc/config.php
<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','geovista');
// Establish database connection.
try
{
    //PDO helps prevent SQL injection and PDO stands for PHP Data Object
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>
BASE_URL=http://localhost/geovista/

## Run
# Visit in browser
http://localhost/geovista

## Admin 
Username: admin 
Password: admin1234
Email: admin@gmail.com (For Forgotton Password)
Mobile number: 1234567899 (For Forgotton Password)

## Features (quick)
Users: browse tours, view maps & safety tips, book, review, contact(Inquiry)
Admin: manage/Create tours, Manage/Create safety, Manage bookings, Manage reviews, Manage Enquiries

