<?php
include 'config.php';
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $category = htmlspecialchars($_POST['category']);

    // Upload gambar
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $target = "assets/images/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    } else {
        $image = null;
    }

    $sql = "INSERT INTO articles (title, content, category, image, user_id) VALUES (:title, :content, :category, :image, :user_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    
    if ($stmt->execute()) {
        echo "Artikel berhasil ditambahkan!";
    } else {
        echo "Terjadi kesalahan.";
    }
}
?>

<form method="POST" action="add_article.php" enctype="multipart/form-data">
    Judul: <input type="text" name="title" required>
    Kategori: <input type="text" name="category" required>
    Konten: <textarea name="content" required></textarea>
    Gambar: <input type="file" name="image">
    <input type="submit" value="Tambah Artikel">
</form>

<?php include 'includes/footer.php'; ?>
