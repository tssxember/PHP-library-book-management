<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
</head>
<body>
    <h1>Edit Book</h1>
    
    <?php if (session()->getFlashdata('errors')): ?>
        <div style="color: red;">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <form action="<?= base_url('books/update/' . $book['id']) ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="current_image" value="<?= $book['image'] ?>">

        <label for="title">Title:</label>
        <input type="text" name="title" value="<?= $book['title'] ?>" required><br>

        <label for="author">Author:</label>
        <input type="text" name="author" value="<?= $book['author'] ?>" required><br>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" value="<?= $book['genre'] ?>" required><br>

        <label for="publication_year">Publication Year:</label>
        <input type="number" name="publication_year" value="<?= $book['publication_year'] ?>" required><br>

        <label for="image">Book Image:</label>
        <input type="file" name="image" id="image"><br>

        <button type="submit">Update</button>
    </form>
    <a href="<?= base_url('books') ?>">Back to List</a>
</body>
</html>
