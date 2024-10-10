<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = htmlspecialchars($_POST['content']);
    $comment_id = $_POST['comment_id'];

    $sql = "UPDATE comments SET content = :content WHERE id = :comment_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':comment_id', $comment_id);
    
    if ($stmt->execute()) {
        echo "Komentar berhasil diupdate!";
    } else {
        echo "Terjadi kesalahan.";
    }
}
?>

<form method="POST" action="edit_comment.php">
    <textarea name="content" required><?= htmlspecialchars($comment['content']) ?></textarea>
    <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
    <input type="submit" value="Update Komentar">
</form>
