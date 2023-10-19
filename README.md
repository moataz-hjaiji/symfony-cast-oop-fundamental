Object Oriented Ship Battling, Ahem Programming
===============================================

This repository holds the screencast code, script and blueprints for a
secret rebel base for the [Object Oriented Series](https://knpuniversity.com/screencast/oo)
from KnpUniversity.

Setup
-----

### 1) Database Setup

This project uses a small MySQL database. First, configure your database settings:

A) open `init_db.php` and modify the `$databaseUser` and `$databasePassword` variables.
Make sure the user has permissions to create a database!

B) To create and pre-populate your database, open your favorite terminal application
and run:

```bash
cd /path/to/the/project
php init_db.php
```
That's it! Your database is ready to go!

### 2) Web Server Setup

To get this code working, open your favorite terminal application
and start the built-in web server:

```bash
cd /path/to/the/project
php -S localhost:8000
```

This command will appear to "hang" - but that's perfect! You're
now running a temporary PHP web server (press ctrl+c to stop it
when you're done later).

Pull up the new site by going to:

    http://localhost:8000

