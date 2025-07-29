<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Books</title>
</head>
<body>
    <h1>List of Books</h1>
    
    <?php if (session()->getFlashdata('success')): ?>
        <div style="color: green; padding: 10px; background: #d4edda; border: 1px solid #c3e6cb; margin: 10px 0;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    
    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red; padding: 10px; background: #f8d7da; border: 1px solid #f5c6cb; margin: 10px 0;">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    
    <a href="<?= base_url('books/create') ?>">Add New Book</a>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($books)): ?>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><?= esc($book['title']) ?></td>
                        <td><?= esc($book['author']) ?></td>
                        <td><?= esc($book['genre']) ?></td>
                        <td><?= esc($book['publication_year']) ?></td>
                        <td>
                            <?php if ($book['image']): ?>
                                <img src="<?= base_url('writable/uploads/' . $book['image']) ?>" width="100" />
                            <?php else: ?>
                                No Image
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('books/edit/' . esc($book['id'])) ?>">Edit</a>
                            <a href="<?= base_url('books/delete/' . esc($book['id'])) ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6">No books found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
