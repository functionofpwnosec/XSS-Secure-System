<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $category = htmlspecialchars($_POST['category']);
    $article_id = $_POST['article_id'];

    $sql = "UPDATE articles SET title = :title, content = :content, category = :category WHERE id = :article_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':article_id', $article_id);
    
    if ($stmt->execute()) {
        echo "Artikel berhasil diupdate!";
    } else {
        echo "Terjadi kesalahan.";
    }
}
?>

<form method="POST" action="edit_article.php">
    Judul: <input type="text" name="title" value="<?= htmlspecialchars($article['title']) ?>" required>
    Kategori: <input type="text" name="category" value="<?= htmlspecialchars($article['category']) ?>" required>
    Konten: <textarea name="content" required><?= htmlspecialchars($article['content']) ?></textarea>
    <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
    <input type="submit" value="Update Artikel">
</form>
