# Library Books Management System

## About This Project

This is a library books management system built with CodeIgniter 4. It allows you to manage a collection of books with features for adding, editing, viewing, and organizing library inventory.

## Features

- Add new books to the library collection
- Edit existing book information
- View all books in a organized list
- Upload book cover images
- Track book details including title, author, genre, and publication year
- Clean and responsive user interface

## Installation & Setup

1. Clone or download this project
2. Install dependencies: `composer install --no-dev`
3. Copy `env` to `.env` and configure your database settings
4. Create a database and configure the connection in `.env`
5. Create a `books` table with the following structure:
   ```sql
   CREATE TABLE books (
       id INT AUTO_INCREMENT PRIMARY KEY,
       title VARCHAR(255) NOT NULL,
       author VARCHAR(255) NOT NULL,
       genre VARCHAR(100),
       publication_year INT,
       image VARCHAR(255),
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
       updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   );
   ```
6. Start the development server: `php spark serve`

## Configuration

Copy `env` to `.env` and configure the following settings:

- **Base URL**: Set your application's base URL
- **Database**: Configure your MySQL/MariaDB connection
- **Environment**: Set to 'development' for testing or 'production' for live use

## Usage

1. Start the development server: `php spark serve`
2. Open your browser and navigate to: `http://localhost:8080/books`
3. Use "Add New Book" to add books to your library
4. Click "Edit" on any book to modify its information
5. Book cover images are stored in `writable/uploads/`

> **Note**: The application runs on `http://localhost:8080` by default when using `php spark serve`. Make sure to access `/books` to view the book management interface.

## Project Structure

- `app/Controllers/Books.php` - Main controller for book management
- `app/Models/BookModel.php` - Database model for books
- `app/Views/books/` - Views for book listing, adding, and editing
- `public/` - Web server document root
- `writable/uploads/` - Storage for uploaded book cover images

## Web Server Configuration

For security, configure your web server to point to the `public/` folder as the document root, not the project root directory.

## Technology Stack

- **Framework**: CodeIgniter 4
- **Language**: PHP 8.1+
- **Database**: MySQL/MariaDB
- **Frontend**: HTML, CSS, Bootstrap (if used)

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> - The end of life date for PHP 8.1 will be December 31, 2025.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
