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
    $id = $_GET["id"];
} catch (PDOException $e) {
    die("error : " . $e->getMessage());
}
$query = $db->prepare("SELECT * FROM fietsen WHERE id =". $id);
$query->execute();

$tests = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($tests as &$data) {
    echo "dier nummer:" . $data['id'] . "<br>";
    echo "merk:". $data['merk'] ."<br>";
    echo "type:". $data['type'] ."<br>";
    echo "beschrijving:". $data['prijs'] ."<br>";
    echo "</a>";
    echo "<br>";
}
?>

<style>
    img {
        width: 200px;
    }
</style>
</body>
</html>
