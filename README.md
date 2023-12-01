
# DPT3054N - Human Resource Management System

Human Resource Management System (HRMS) is a software application used to store employee data and perform list of human resource functions, such as department, position, leave, attendance, payroll, etc. 

## Table of Contents

- [Features](#features)
- [Default Admin User](#default-admin-user)
- [Prerequisites](#prerequisites)
- [Installation](#installation)

## Features

- User authentication system with seperated site (Admin / Employee Site)
- Payroll Management with Automated PDF Export Features
- Forum (Discussion Platform)
- Attendance Management
- Leave Application with Approval Process

**Admin Site**
- Dashboard
- Manage Employee (User Account)
- Manage Department and Position
- Manage Leave Application
- Manage Attendance
- Payroll Management
- Forum

**Employee Site**
- View Payroll Record
- View Attendance Record
- Apply Leave Application
- Forum

## Default Admin User

| Email  | Password |
| ------------- | ------------- |
| admin@hr-system.com | 123456789 |

## Prerequisites

Before start to install this web application, please ensure you have the following software or JDK installed on your system.

**For Windows User**
- [PHP (Version 7.4 or higher)](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/download/)
- MYSQL

**For Mac User**
- [Herd](https://herd.laravel.com/)

**Recommended IDE**
- [Jetbrains PHPStorm](https://www.jetbrains.com/phpstorm/)
- [Jetbrains IntelliJ IDEA](https://www.jetbrains.com/idea/)
- [Visual Studio Code](https://code.visualstudio.com/)

> Refercence: [Laravel Installation Guide](https://laravel.com/docs/10.x/installation)

## Installation

Follow these steps to let this repository run in your localhost:

1. Clone this repository

```bash
  git clone https://github.com/yongchun12/DTP3054N-Project.git
```
---
2. Install Dependencies

```bash
  composer install
```
---
Some of the people may faced the problem that shows **Your php version (8.1.2) does not satisfy that requirement**. May try this command:

```bash
  composer install --ignore-platform-reqs
```
---
3. Environment Configuration (**.env** file)

```bash
  cp .env.example .env
```

Open the **.env** file and set your database and mail credentails or anyu other environment specific configuration.

---

4. Generate Application Key

```bash
  php artisan key:generate
```
Generate a new application key to securing this application.

---

5. Run Database Migration and Seeders

Make sure the database credentials in **.env** are correct. Then run all of the migrations and seeders file to migrate all database table and data into your database.

```bash
  php artisan migrate

  php artisan db:seed
```

Optionally, you can migrate the default data and table one of the time by using:

```bash
  php artisan migrate --seed
```

---

6. Run web application
This will start the server at **http://localhost:8000**

```bash
  php artisan serve
```
