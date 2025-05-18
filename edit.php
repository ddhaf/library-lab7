<?php
include 'db.php';
$id = $_GET['id'];
$row = $conn->query("SELECT * FROM library WHERE id=$id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
<h2>Edit Book</h2>
<form action="update.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">

    <label>Book Title:</label>
    <div class="mb-3"><input type="text" class="form-control" name="book_title" value="<?= $row['book_title'] ?>" required></div>

    <label>Author Name:</label>
    <div class="mb-3"><input type="text" class="form-control" name="author_name" value="<?= $row['author_name'] ?>" required></div>

    <label>Book Cover:</label>
    <div class="mb-3"><input type="file" class="form-control" name="book_cover"></div>

    <label>Genre:</label>
    <div class="mb-3"></div>
    <select name="genre" required>
        <?php
        $genres = ["Fiction", "Non-fiction", "Sci-Fi", "Biography"];
        foreach ($genres as $g) {
            $selected = ($row['genre'] == $g) ? 'selected' : '';
            echo "<option value='$g' $selected>$g</option>";
        }
        ?>
    </select><br><br>

    <label>Publication Year:</label>
    <div class="mb-3"><input type="date" class="form-control" name="publication_year" value="<?= $row['publication_year'] ?>" required></div>

    <label>Quantity:</label>
    <div class="mb-3"></div><input type="number" class="form-control" name="quantity" value="<?= $row['quantity'] ?>" required><br>

    <input type="submit" button class="btn btn-success" value="Update Book">
</form><br>
<a href="index.php">Back to List</a>
</body>
</html>