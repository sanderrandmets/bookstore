<?php
require_once 'db_connection.php';

$id = $_GET['id'];
$title = $_GET['title'];

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(['id' => $id]);
$book =$stmt->fetch();



?>
<?php echo $book['title'];?><br>
<form action="edit.php" method="get">
    <input type="text" name="title" value="<?php echo $book['title'];?>">
    <input type="submit" name="edit" value="Salvesta">
    <input type="hidden" name="id" value="<?php echo $id;?>">
</form>
<?php
if (isset($_GET[edit])) {
    $stmt = $pdo->prepare('UPDATE books SET title=:title WHERE id = :id');
    $stmt->execute(['id' => $id, 'title' => $title]);
    header('Location: book.php?id='.$id);
}
?>
