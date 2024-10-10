<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = htmlspecialchars($_POST['content']);
    $article_id = $_POST['article_id'];

    $sql = "INSERT INTO comments (content, article_id, user_id) VALUES (:content, :article_id, :user_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':article_id', $article_id);
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    
    if ($stmt->execute()) {
        echo "Komentar berhasil ditambahkan!";
    } else {
        echo "Terjadi kesalahan.";
    }
}
?>

<form method="POST" action="add_comment.php">
    <textarea name="content" required></textarea>
    <input type="hidden" name="article_id" value="<?= $article_id ?>">
    <input type="submit" value="Tambah Komentar">
</form>
