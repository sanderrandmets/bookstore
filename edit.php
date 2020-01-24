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
    <button type="button" class="btn">Salvesta</button>
</form>
<?php
$stmt = $pdo->prepare('UPDATE books SET title=:title WHERE id = :id');
$stmt->execute(['id' => $id, 'title' => $title]);
?>
