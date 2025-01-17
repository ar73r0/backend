# Tentverhuur laravel

## Overview

This Laravel project is a dynamic, data-driven web application built to meet specific functional and technical requirements. It demonstrates CRUD functionality, authentication, and other key features of Laravel, while adhering to best practices in web development.

## Features

The application includes the following features:

- **Authentication System**
        User registration and login.
        Two user roles: Admin and User.
        Admins can:
            Promote/demote users to/from admin.
            Manually create new users.
        Password reset functionality.
        Default admin credentials:
            Username: admin
            Email: admin@ehb.be
            Password: Password!321

- **Profile Page**
  - Each user has a public profile.
  - Fields include:
    - Username
    - Birthday
    - Profile picture (stored on the server).
    - "About Me" text.
  - Users can update their own profiles.

- **News Management**
    - Admins can create, edit, and delete news items.
    - News items have:
      - Title
      - age
      - Content
      - Publication date.
    - All users can view a list of news items and their details.

- **FAQ Page**
  - FAQs are grouped by categories.
  - All visitors can view FAQs.

- **Contact Page**
    - A contact form available to all visitors.
    - Sends form submissions to the admin.

## Installation

To get started with the project, follow the steps below:

### 1. Clone the repository

Clone the repository to your local machine using Git:

```bash
git clone https://github.com/ar73r0/backend
```

### 2. Install dependencies

Install the required dependencies using npm (Node.js package manager). This will install all necessary packages specified in the `package.json` file:

```bash
npm install
```

### 3. Set up the MySQL database

Create a MySQL database for the project. You can do this by logging into your MySQL instance and running:

```sql
CREATE DATABASE chiro9;
```

### 4. Set up environment variables

Create a `.env` file in the project root directory to store sensitive information such as the database credentials. For example:

```env
DB_HOST=127.0.0.1
DB_USER=root
DB_PASSWORD=
DB_NAME=chiro9
PORT=3000
DIALECT=mysql
```

### 6. Start the project

You can start the server using the following commands:

```bash
npm run dev
php artisan serve
```
and make sure apache and mysql are running aswell

The server will run on the default port (e.g., `http://127.0.0.1:3000`).



