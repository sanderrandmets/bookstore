<?php
require_once 'db_connection.php';

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(['id' => $id]);
$book =$stmt->fetch();
?>


<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title><?php echo $book['title'];?></title>
</head>
<body>
<?php print_r($book);?><br>
Pealkiri: <?php echo $book['title'];?><br>
Keel: <?php echo $book['language'];?><br>
Aasta: <?php echo $book['release_date'];?><br>
kokkuvõte: <?php echo $book['summary'];?><br>
Hind: <?php echo $book['price'];?><br>
Lao seis: <?php echo $book['stock_saldo'];?><br>
Lehekülgede arv <?php echo $book['pages'];?><br>
Tüüp: <?php echo $book['type'];?><br>
<a href="delete.php?id=<?php echo $id?>">DELETE</a>
</body>
</html>

