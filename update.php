<?php
include 'db.php';
$id = $_POST['id'];
$book_title = $_POST['book_title'];
$author_name = $_POST['author_name'];
$genre = $_POST['genre'];
$publication_year = $_POST['publication_year'];
$quantity = $_POST['quantity'];
if ($_FILES['book_cover']['tmp_name']) {
    $book_cover = addslashes(file_get_contents($_FILES['book_cover']['tmp_name']));
    $sql = "UPDATE library SET book_title='$book_title', author_name='$author_name',
            genre='$genre', publication_year='$publication_year', quantity=$quantity,
            book_cover='$book_cover' WHERE id=$id";
} else {
    $sql = "UPDATE library SET book_title='$book_title', author_name='$author_name',
            genre='$genre', publication_year='$publication_year', quantity=$quantity
            WHERE id=$id";
}
if ($conn->query($sql)) {
    echo "Book updated! <a href='index.php'>Back to list</a>";
} else {
    echo "❌ Error: " . $conn->error;
}
?>