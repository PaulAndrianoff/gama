# GamaPhp Framework

GamaPhp is a lightweight PHP framework designed to simplify web application development. It offers features such as routing, controllers, models, views, and more.

## Features

- Simple and intuitive routing system
- MVC architecture for organizing your code
- Object-Relational Mapping (ORM) for database operations
- Helper functions for common tasks
- Unit testing support with PHPUnit
---


## Usage
1. Define your routes in the src/Routes/web.php file.
2. Create controllers in the src/Controllers directory to handle specific routes and business logic.
3. Define your models in the src/Models directory to interact with the database.
4. Create views in the src/Views directory to display data to users.
5. Run the application using a local server or a development environment.
```shell
php -S localhost:8000 -t public
```
6. Access your application in a web browser at http://localhost:8000 or the specified host and port.
---


## Running Unit Tests
1. Write your unit tests in the tests directory using PHPUnit.
2. Run the tests using the following command:
```shell
vendor/bin/phpunit tests
```
---


## Commands
### Creating a New Route and Controller

You can use the make:route command to generate a new route and its corresponding controller automatically. Open a terminal and run the following command:
```shell
php console.php make:route user/profile
```

sass --style compressed assets/styles/styles.scss public/css/styles.min.css
