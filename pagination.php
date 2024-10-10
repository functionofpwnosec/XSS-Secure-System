<?php
// Hitung total artikel untuk paginasi
$sql_count = "SELECT COUNT(*) FROM articles";
$stmt_count = $conn->prepare($sql_count);
$stmt_count->execute();
$total_articles = $stmt_count->fetchColumn();

$total_pages = ceil($total_articles / $limit);

if ($total_pages > 1) {
    echo "<ul class='pagination'>";
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<li><a href='index.php?page=$i'>$i</a></li>";
    }
    echo "</ul>";
}
?>
