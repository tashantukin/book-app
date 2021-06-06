# Book Application
	A simple application which enables the user to perform CRUD operations and export book details in csv format. 
	This project was built in dockerize Laravel, React and Mysql as the database.
# Preview
![preview_1](https://user-images.githubusercontent.com/32629251/120915031-173a5f80-c6d4-11eb-9a9a-91451260621e.JPG)


# Table of contents
- [Book Application](#book-application)
- [Demo-Preview](#preview)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
  - [Add a new book](#adding-new-book) 
  - [Updating author](#updating-author-name)
  - [Deleting book entry](#deleting-book-entry)
  - [Search book / author](#search)
  - [Sorting by title/author](#sorting)
  - [CSV export](#file-export)
- [API Documentation](#api-documentation)
- [Unit Tests (PHPUnit)](#unit-tests) 

# Requirements
[(Back to top)](#table-of-contents)
- [Docker](https://docs.docker.com/install)
- [Docker Compose](https://docs.docker.com/compose/install)

# Installation
1. Clone the repository.
2. Start the containers by running `docker-compose up -d` in the project root.
3. Three (3) containers should be created one for backend(laravel), front end(react app) and the db (mysql).
4. Database migration
 ```
      Run `docker exec -it assignment01-laravel sh` in the project root to be able to run commands in laravel container.
      Perform migration with  `php artisan migrate`
      Once migration is done, seed the db by running `php artisan db:seed --class=BookSeeder`
  ```
3. Access the book application on localhost:3000

# Usage
[(Back to top)](#table-of-contents)

# Adding new book
[(Back to top)](#table-of-contents)

- Create a new book by navigating to 'Add new book' button
![add_book](https://user-images.githubusercontent.com/32629251/120915431-2f12e300-c6d6-11eb-9b5e-3e1d20777266.PNG)
- Provide the book title and the author and save..
- 
![save_new](https://user-images.githubusercontent.com/32629251/120915453-43ef7680-c6d6-11eb-87e0-27222cd13858.PNG)
- The newly created book entry should be displayed from the book list.
- 
![new_book](https://user-images.githubusercontent.com/32629251/120915466-63869f00-c6d6-11eb-8b0a-4200d0b7d7e4.PNG)

# Updating author name
[(Back to top)](#table-of-contents)

- Only the author name can be edited. Book title field is disabled by default.
![edit_1](https://user-images.githubusercontent.com/32629251/120915606-21aa2880-c6d7-11eb-81cc-c11a7b8d54ce.PNG)

![edit_2](https://user-images.githubusercontent.com/32629251/120915637-659d2d80-c6d7-11eb-9f55-c2f791b2785c.PNG)

# Deleting book entry
[(Back to top)](#table-of-contents)

- Should display a pop up confirmation before deleting an entry. 
![delete1](https://user-images.githubusercontent.com/32629251/120915697-ca588800-c6d7-11eb-94da-4b1439d37f2d.PNG)

# Search
[(Back to top)](#table-of-contents)
- A book can be searched by title or author name
![search_1](https://user-images.githubusercontent.com/32629251/120915796-5ec2ea80-c6d8-11eb-841d-6d12f938f56c.PNG)

![seacrh_2](https://user-images.githubusercontent.com/32629251/120915848-9a5db480-c6d8-11eb-9fdd-a24de411ac9b.PNG)


# Sorting
[(Back to top)](#table-of-contents)
- A book can be sorted by title or author. Click on the table header to sort by which.
	## Title 
![by_title](https://user-images.githubusercontent.com/32629251/120915956-4b644f00-c6d9-11eb-95a2-d174a5236f3f.PNG)

![by_author](https://user-images.githubusercontent.com/32629251/120916001-75b60c80-c6d9-11eb-9863-49fa20429260.PNG)

# File Export
[(Back to top)](#table-of-contents)
- Book details can be exported accordingly with the following options in csv format:
- ![export](https://user-images.githubusercontent.com/32629251/120916182-a77ba300-c6da-11eb-82d0-27d6d7ac8cb8.PNG)

	- All books (all book details)
	- All authors
	- All titles
	
# API Documentation
[(Back to top)](#table-of-contents)

- API documentation is supported by OpenAPi- Swagger. Check and test the endpoints built for Books.
- Access `http://localhost:80/api/documentation`

  ![api_doc](https://user-images.githubusercontent.com/32629251/120916997-6934b280-c6df-11eb-963d-fb647b46ab45.PNG)
  
# Unit Tests 
[(Back to top)](#table-of-contents)

- Relevant test cases were created to test the API functionalities. 
- Access the test suite results by running `vendor/bin/phpunit` inside the laravel container.
# The following are the list of test cases created:
- A book can be added
- Title is required
- Author is required
- A book can be updated
- A book can be deleted



