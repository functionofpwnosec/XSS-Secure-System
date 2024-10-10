<?php
include 'config.php';

$article_id = isset($_GET['id']) ? (int)$_GET['id'] : null;

if ($article_id) {
    $sql = "SELECT * FROM articles WHERE id = :article_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':article_id', $article_id);
    $stmt->execute();
    $article = $stmt->fetch();

    echo "<h2>" . htmlspecialchars($article['title']) . "</h2>";
    echo "<p>" . htmlspecialchars($article['content']) . "</p>";

    if ($article['image']) {
        echo "<img src='assets/images/" . htmlspecialchars($article['image']) . "' alt='Gambar Artikel'>";
    }

    // Menampilkan komentar
    $sql_comment = "SELECT * FROM comments WHERE article_id = :article_id";
    $stmt_comment = $conn->prepare($sql_comment);
    $stmt_comment->bindParam(':article_id', $article_id);
    $stmt_comment->execute();
    $comments = $stmt_comment->fetchAll();

    echo "<h3>Komentar</h3>";
    foreach ($comments as $comment) {
        echo "<p>" . htmlspecialchars($comment['content']) . "</p>";
    }

    include 'add_comment.php'; // Include form komentar
} else {
    echo "Artikel tidak ditemukan.";
}
?>
