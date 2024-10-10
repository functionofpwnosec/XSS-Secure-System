<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment_id = $_POST['comment_id'];

    $sql = "DELETE FROM comments WHERE id = :comment_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':comment_id', $comment_id);
    
    if ($stmt->execute()) {
        echo "Komentar berhasil dihapus!";
    } else {
        echo "Terjadi kesalahan.";
    }
}
?>

<form method="POST" action="delete_comment.php">
    <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
    <input type="submit" value="Hapus Komentar">
</form>
