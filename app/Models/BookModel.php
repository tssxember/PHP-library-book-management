<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'author', 'genre', 'publication_year', 'image'];

    // Add validation rules if needed
    protected $validationRules = [
        'title' => 'required',
        'author' => 'required',
        'publication_year' => 'required|numeric',
    ];
}