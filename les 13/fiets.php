<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=fietsenmaker",
        "root", "");
} catch (PDOException $e) {
    die("error : " . $e->getMessage());
}
$query = $db->prepare("SELECT * FROM fietsen");
$query->execute();

$tests = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($tests as $data) {
    echo "<a href='detail.php?id=" . $data['id'] . "'>";
    echo $data['merk'];
    echo "</a>";
    echo $data['type'];
    echo "<br>";
}
?>
<a href="insert.php">insert een product</a>
</body>
</html>
