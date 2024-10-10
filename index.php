<?php
include 'config.php';
include 'includes/header.php';
include 'includes/nav.php';

// Tentukan jumlah artikel per halaman
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Ambil data artikel dari database
$sql = "SELECT * FROM articles LIMIT :start, :limit";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':start', $start, PDO::PARAM_INT);
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->execute();
$articles = $stmt->fetchAll();

foreach ($articles as $article) {
    echo "<h2><a href='view_article.php?id=" . htmlspecialchars($article['id']) . "'>" . htmlspecialchars($article['title']) . "</a></h2>";
    echo "<p>" . htmlspecialchars(substr($article['content'], 0, 100)) . "...</p>";
}

include 'pagination.php';
include 'includes/footer.php';
?>
