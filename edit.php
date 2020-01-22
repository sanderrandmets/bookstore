<?php
require_once 'db_connection.php';

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(['id' => $id]);
$book =$stmt->fetch();
?>
<?php echo $book['title'];?><br>
<form action="edit.php" method="input">
