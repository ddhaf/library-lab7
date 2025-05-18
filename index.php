<?php
include 'db.php';
$result = $conn->query("SELECT * FROM library");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Library Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

    <h2 class="mb-4">Add New Book</h2>

    <form action="create.php" method="POST" enctype="multipart/form-data" class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Book Title</label>
            <input type="text" name="book_title" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Author Name</label>
            <input type="text" name="author_name" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Book Cover</label>
            <input type="file" name="book_cover" accept="image/*" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">Genre</label>
            <select name="genre" class="form-select" required>
                <option value="Fiction">Fiction</option>
                <option value="Non-fiction">Non-fiction</option>
                <option value="Sci-Fi">Sci-Fi</option>
                <option value="Biography">Biography</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label">Publication Year</label>
            <input type="date" name="publication_year" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Quantity</label>
            <input type="number" name="quantity" min="1" class="form-control" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Add Book</button>
        </div>
    </form>

    <hr class="my-5">

    <h2 class="mb-4">Book List</h2>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Cover</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Qty</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td>
                    <?php if ($row['book_cover']): ?>
                        <img src="data:image/jpeg;base64,<?= base64_encode($row['book_cover']) ?>" width="60" class="img-thumbnail">
                    <?php endif; ?>
                </td>
                <td><?= $row['book_title'] ?></td>
                <td><?= $row['author_name'] ?></td>
                <td><?= $row['genre'] ?></td>
                <td><?= $row['publication_year'] ?></td>
                <td><?= $row['quantity'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
