# Library Passes

This project provides an web based interface for students to make library passes and for teachers/admins to manage the library passes database easily.

## What does it do?

### Students:
  When the home page is loaded they are presented with form in which they must specify the period, date, their name, and teacher name. The period and teacher name come from a drop down menu that accesses a MySQL database called LibraryPasses, which can be easily implemented with the libraypasses.sql file, to demonstrate valid entries and the text fields of the student information, like name and email, are validated against the database to make sure that student actually exists. Given that the desired period is not full and the student's information exists in the database, then a pass will be inserted into the database table containing their ID, slot ID and, teacher ID. Otherwise if the slot is full or something they entered doesn't exist, a pass will not be made and the submission page will show them the incorrect information they entered or if the slot is full.
  
### Teachers/Admins:
  Once on the home page, admins will have to click on the link which says "admin login", which will take them to a login page. The username ("libadmin") and passcode ("admin1") are coded into the "login_verifier.php" file in order to verify that valid credentials were used. After loggin in, an admin can view the tables and perform admin actions. These actions include removing or adding students and teachers, removing a pass or all passes, and changing the max passes for a given period.
  
## Getting Started

After downloading a copy of the repository and having MySQL installed, a person should then create a new database with the provided .sql file by using a command along the lines what is listed below with the appropiate credentials filled in.
  *NOTE: you might have to create a database with the command CREATE DATABASE first*
```
  mysql -u username -p database_name < LibraryPasses.sql
```
Also, in the "sqlmanager.php", lines 14-17 should be updated with credentials relevant to your database
```
  $servername = 'localhost'; // <-- Change only if the database is not hosted on the same machine
  $username = 'williamws'; // Change this login
  $passcode = 'williamws'; // Change this passcode
  $databasename = 'LibraryPasses';  // Change this if the database is named differently
```

Once the database is correctly configured and the ability to act as a server is enabled, you can run the following command from a terminal located where the directory is downloaded.
```
  php -S 0.0.0.0:8888 <--- LAN access, can be accesed by host computer and other computer. The local ip must be used to connect to the server (such as 10.0.2.98:8888) in the searchbar
```
```
  php -S localhost:8888 <--- Local hosting & can only be accesed from host computer (localhost:8888 in searchbar)
```

### Prerequisites

For this software to run, MySQL and PHP must be installed and configured to allow for server functionality and accepting connections.


## Built With

* [PHP](https://www.php.net/) - Backend Language
* [MySQL](https://dev.mysql.com/downloads/mysql/) - Database
* CSS and HTML


## Authors

* **William Walling-Sotolongo** - *Database Creation & Maintence, PHP, CSS, HTML* - [ALearningCurve](https://github.com/ALearningCurve)


* **Meenu R.** - *HTML & CSS for home page* 

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
