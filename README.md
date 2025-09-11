Slide 1: Title

📚 BookMate API

Simple PHP RESTful API for managing books

Your Name / Date

Slide 2: Description

BookMate allows you to add, view, edit, and delete books

JSON-based API responses

Lightweight and easy to use

Slide 3: Features

Get all books (GET /books)

Add a new book (POST /books)

Edit a book (PUT /books/{id})

Delete a book (DELETE /books/{id})

Simple frontend to interact with API

Slide 4: Installation / Setup

Clone repository

Move to project folder

Setup PHP server (XAMPP)

Create database bookmate

Create books table:

Code: CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL
);
