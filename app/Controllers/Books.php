<?php

namespace App\Controllers;

use App\Models\BookModel;
use CodeIgniter\Controller;

class Books extends Controller
{
    public function index()
    {
        $model = new BookModel();
        $data['books'] = $model->findAll();
        
        return view('books/index', $data);
    }

    // Add book form
    public function create()
    {
        return view('books/add');
    }

    // Save book
    public function store()
    {
        $model = new BookModel();

        // Validate form input
        if (!$this->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'publication_year' => 'required|numeric',
        ])) {
            return redirect()->to(base_url('books/create'))->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file upload (if exists)
        $image = $this->request->getFile('image');
        if ($image && $image->isValid()) {
            $imageName = $image->getRandomName();
            $image->move(WRITEPATH . 'uploads', $imageName);
        } else {
            $imageName = null;
        }

        // Save book data to DB
        $model->save([
            'title' => $this->request->getVar('title'),
            'author' => $this->request->getVar('author'),
            'genre' => $this->request->getVar('genre'),
            'publication_year' => $this->request->getVar('publication_year'),
            'image' => $imageName,
        ]);

        return redirect()->to(base_url('books'))->with('success', 'Book added successfully!');
    }

    // Edit book form
    public function edit($id)
    {
        $model = new BookModel();
        $data['book'] = $model->find($id);
        
        if (empty($data['book'])) {
            return redirect()->to(base_url('books'))->with('error', 'Book not found.');
        }

        return view('books/edit', $data);
    }

    // Update book
    public function update($id)
    {
        $model = new BookModel();
        
        // Check if book exists
        $book = $model->find($id);
        if (empty($book)) {
            return redirect()->to(base_url('books'))->with('error', 'Book not found.');
        }

        // Validate form input
        if (!$this->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'publication_year' => 'required|numeric',
        ])) {
            return redirect()->to(base_url("books/edit/$id"))->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file upload (if exists)
        $image = $this->request->getFile('image');
        if ($image && $image->isValid()) {
            $imageName = $image->getRandomName();
            $image->move(WRITEPATH . 'uploads', $imageName);
        } else {
            $imageName = $this->request->getVar('current_image');
        }

        // Update book data in DB
        $model->update($id, [
            'title' => $this->request->getVar('title'),
            'author' => $this->request->getVar('author'),
            'genre' => $this->request->getVar('genre'),
            'publication_year' => $this->request->getVar('publication_year'),
            'image' => $imageName,
        ]);

        return redirect()->to(base_url('books'))->with('success', 'Book updated successfully!');
    }

    // Delete book
    public function delete($id)
    {
        $model = new BookModel();
        $book = $model->find($id);
        
        if (empty($book)) {
            return redirect()->to(base_url('books'))->with('error', 'Book not found.');
        }

        // Delete image file if exists
        if ($book['image'] && file_exists(WRITEPATH . 'uploads/' . $book['image'])) {
            unlink(WRITEPATH . 'uploads/' . $book['image']);
        }

        // Delete book record from DB
        $model->delete($id);

        return redirect()->to(base_url('books'))->with('success', 'Book deleted successfully!');
    }
}
