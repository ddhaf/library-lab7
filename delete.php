<?php
include 'db.php';
$id = $_GET['id'];
if ($conn->query("DELETE FROM library WHERE id=$id")) {
    echo "Book deleted. <a href='index.php'>Back to list</a>";
} else {
    echo " Error: " . $conn->error;
}
?>