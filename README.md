# SQLlion [![CodeFactor](https://www.codefactor.io/repository/github/thomasfrew/sqllion/badge)](https://www.codefactor.io/repository/github/thomasfrew/sqllion)
[SQLlion](https://github.com/ThomasFrew/SQLlion) is an open-source and simplistic online game which blends [PHP](http://www.php.net/) with [MySQL](https://www.mysql.com/) to create both aesthetical and functional interfaces. If you have the time, feel free to check *Installation* for directions on how to download and test SQLlion!

## Features
SQLlion boasts a wide variety of pages which give users the ability to:

* Register, log in and log out securely.
* Battle or mine for virtual currency: DBcoins
* Shop for a variety of weapons.
* Chat with other users on a forum.
* Compete with other users on a leaderboard.

## Installation
This simple how-to guide will show to download and run SQLlion on your netowrk for testing purposes.

### 1. Prerequisites
To run SQllion, you will first need to download [PHP 7](http://www.php.net/), [Abyss Web Server](https://aprelium.com/abyssws/) and [MySQL 8 (community edition)](https://dev.mysql.com/downloads/mysql/). Ensure that Abyss is configured to interpret PHP.

### 2. Configuration
Next, you must go into MySQL Command Line and enter these precise commands:
```
CREATE DATABASE IF NOT EXISTS sqllion;
```
```
CREATE USER IF NOT EXISTS 'gary'@'localhost' IDENTIFIED WITH mysql_native_password BY 'garypass';
```
```
GRANT SELECT, INSERT, UPDATE ON sqllion TO 'gary'@'localhost';
```
This will set up a new user who can interact with the new database.

### 3. Setup
Finally, download the latest release of SQLlion and run each `.sql` file within the MySQL Command Line using the following syntax:
```
SOURCE 'C:\path-to-sql-scripts\script.sql
```

*Note: It is very important that all files and folders are placed in the same directory!*

## Guidelines 
Ensure you check out our various guidelines before contributing to SQLlion:
* [Code of Conduct](https://github.com/ThomasFrew/SQLlion/blob/master/CODE_OF_CONDUCT.md)
* [Contributing Guidelines](https://github.com/ThomasFrew/SQLlion/blob/master/CONTRIBUTING.md)
* [Issue Templates](https://github.com/ThomasFrew/SQLlion/tree/master/.github/ISSUE_TEMPLATE)
* [Pull Request Template](https://github.com/ThomasFrew/SQLlion/blob/master/PULL_REQUEST_TEMPLATE.md)

## Versioning
SQLlion is currently at Version 1.0.0 (v1.0.0). See [Semantic Versioning](https://semver.org/) if you do not understand what this means.

## Lisence
SQLlion is lisenced under [Apache License 2.0](https://www.apache.org/licenses/LICENSE-2.0)- see [LISENCE.md](https://github.com/ThomasFrew/SQLlion/blob/master/LICENSE) a full disclosure of this.

## Acknowledgments
* A huge toast to Mike McGrath, author of *[PHP and MySQL in easy steps](https://www.booktopia.com.au/php-mysql-in-easy-steps-mike-mcgrath/prod9781840788273.html?source=pla&gclid=EAIaIQobChMIusy7uMb53wIVCyQrCh2nOQgZEAYYASABEgLcS_D_BwE)*: the book that first taught me PHP and MySQL!
* Thanks to anyone who has checked out this repository: that means you!
