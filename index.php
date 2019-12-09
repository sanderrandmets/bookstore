<?php
$host = '127.0.0.1';
$db   = 'Books';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

//var_dump($_GET);

$title = $_GET['title'];
$year = $_GET['year'];
$stmt = $pdo->prepare('SELECT * FROM books WHERE title LIKE :title AND release_date LIKE :year');
$stmt->execute(['title' => '%' . $title . '%', 'year' => $year]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
</head>
<body>
     <h1>Otsing</h1>

     <form action="index.php" method="get">
          Pealkiri:
          <br>
          <input type="text" name="title" placeholder="Pealkiri" value="<?=$title?>" style="margin: 4px">
          <br>
          <input type="text" name="year" placeholder="Aasta" value="<?=$year?>" style="margin: 4px">
          <br>
          <input type="submit" value="Otsi" style="margin: 4px">
     </form>
     <ul>

<?php
while ( $row =$stmt->fetch() ){

    echo '<li>' . $row['title'] . '</li>';
}
?>

     </ul> 
</body>
</html>

