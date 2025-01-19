<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<?php

include 'connectdb.php';
const MERK_REQUIRED = 'merk invullen';
const TYPE_REQUIRED = 'type invullen';
const PRIJS_REQUIRED = 'prijs invullen';
const AGREE_REQUIRED = 'agree voorwaarden';

$errors = [];
$inputs = [];

if (isset($_POST['send'])) {
    $merk = filter_input(INPUT_POST, 'merk', FILTER_SANITIZE_SPECIAL_CHARS);
    $merk = trim($merk);
    if (empty($merk)) {
        $errors['merk'] = MERK_REQUIRED;
    }
    else {
        $inputs['merk'] = $merk;
    }
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_SPECIAL_CHARS);

    $type = trim($type);
    if (empty($type)) {
        $errors['type'] = TYPE_REQUIRED;
    }
    else {
        $inputs['type'] = $type;
    }
    $prijs = filter_input(INPUT_POST, 'prijs', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    $prijs = trim($prijs);
    if (empty($prijs)) {
        $errors['prijs'] = PRIJS_REQUIRED;
    }
    else {
        $inputs['prijs'] = $prijs;
    }
    $agree = filter_input(INPUT_POST, 'agree', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($agree === null) {
        $errors['agree'] = AGREE_REQUIRED;
    }
    else {
        $inputs['agree'] = $agree;
    }
    if (count ($errors) === 0) {
        global $db;

        $sth = $db->prepare('INSERT INTO fietsen (merk, type, prijs) VALUES (:merk, :type, :prijs)');
        $sth->bindParam(':merk', $inputs['merk'], PDO::PARAM_STR);
        $sth->bindParam(':type', $inputs['type'], PDO::PARAM_STR);
        $sth->bindParam(':prijs', $inputs['prijs'], PDO::PARAM_STR);
        $result = $sth->execute();

        header('location: ./fiets.php');

    }
}
?>

<h2>insert fiets</h2>
<form method="post" action=""
<div class="mb-3 w-50">
    <label for="n" class="form-label">merk</label>
    <input type="text" class="form-control w-50" id="n" name="merk"
           value="<?php echo $inputs['merk'] ?? '' ?>">
    <div class="form-text text-danger">
        <?= $errors['merk'] ?? '' ?>
    </div>
</div>

<div class="mb-3">
    <label for="b">type</label>
    <textarea name="type" id="b" rows="3" class="form-control w-50"><?php echo $inputs['type'] ?? '' ?></textarea>
    <div class="form-text text-danger">
        <?= $errors['type'] ?? '' ?>
    </div>
</div>

<div class="mb-3">
    <label for="b">prijs</label>
    <textarea name="prijs" rows="1" class="form-control w-50"><?php echo $inputs['prijs'] ?? '' ?></textarea>
    <div class="form-text text-danger">
        <?= $errors['prijs'] ?? '' ?>
    </div>
</div>

<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="a" name="agree" value="agree"
        <?php echo (isset($inputs['agree'])?'checked="checked"':'') ?>>
    <label class="form-check label" for="a">accepteer voorwaarden</label>
    <div class="form-text text-danger">
        <?= $errors['agree'] ?? '' ?>
    </div>
</div>



<input type="submit" class="btn btn-primary" name="send" value="verzenden">
</form>
</body>
</html>