<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
</head>
<body>
    <h1>Add Book</h1>
    
    <?php if (session()->getFlashdata('errors')): ?>
        <div style="color: red;">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <form action="<?= base_url('books/store') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?= old('title') ?>" required><br>

        <label for="author">Author:</label>
        <input type="text" name="author" id="author" value="<?= old('author') ?>" required><br>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre" value="<?= old('genre') ?>" required><br>

        <label for="publication_year">Publication Year:</label>
        <input type="number" name="publication_year" id="publication_year" value="<?= old('publication_year') ?>" required><br>

        <label for="image">Book Image:</label>
        <input type="file" name="image" id="image"><br>

        <button type="submit">Save</button>
    </form>
    <a href="<?= base_url('books') ?>">Back to List</a>
</body>
</html>
