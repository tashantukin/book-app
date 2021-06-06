# Book Application
	A simple application which enables the user to perform CRUD operations and export book details in csv format. 
	This project was built in dockerize Laravel, React and Mysql as the database.
# Demo-Preview


# Table of contents
- [Book Application](#book-application)
- [Demo-Preview](#demo-preview)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)


## Requirements
- [Docker](https://docs.docker.com/install)
- [Docker Compose](https://docs.docker.com/compose/install)

## Installation
1. Clone the repository.
2. Start the containers by running `docker-compose up -d` in the project root.
3. Three (3) containers should be created one for backend(laravel), front end(react app) and the db (mysql).
4. Database migration
 ```
      Run `docker exec -it assignment01-laravel sh` in the project root.
      Perform migration with  `php artisan migrate`
      Once migration is done, seed the db by running `php artisan db:seed --class=BookSeeder`
  ```
3. Access the book application on localhost:3000

# Usage

