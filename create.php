<?php
include 'db.php';
$book_title = $_POST['book_title'];
$author_name = $_POST['author_name'];
$genre = $_POST['genre'];
$publication_year = $_POST['publication_year'];
$quantity = $_POST['quantity'];
$book_cover = addslashes(file_get_contents($_FILES['book_cover']['tmp_name']));
$sql = "INSERT INTO library (book_title, author_name, book_cover, genre, publication_year, quantity)
        VALUES ('$book_title', '$author_name', '$book_cover', '$genre', '$publication_year', $quantity)";
if ($conn->query($sql)) {
    echo "✅ Book added! <a href='index.php'>Go back</a>";
} else {
    echo "❌ Error: " . $conn->error;
}
?>