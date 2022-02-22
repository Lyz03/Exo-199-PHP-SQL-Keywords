<?php

$db = new PDO('mysql:host=localhost;dbname=exo_199;charset=utf8', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$stmt = $db->prepare("SELECT prenom, nom, pays FROM users");

function printInfo($stmt) {
    if ($stmt->execute()) {
        echo '<pre>';
        var_dump($stmt->fetchAll());
        echo '<pre>';
    }
}

printInfo($stmt);

$stmt = $db->prepare("SELECT DISTINCT pays from users");
printInfo($stmt);

$stmt = $db->prepare("SELECT * from users ORDER BY nom ASC");
printInfo($stmt);

$stmt = $db->prepare("SELECT * from users ORDER BY nom DESC");
printInfo($stmt);

$stmt = $db->prepare("SELECT MIN(argent) from users");
printInfo($stmt);

$stmt = $db->prepare("SELECT MAX(argent) from users");
printInfo($stmt);

$stmt = $db->prepare("SELECT MIN(argent) as argentMin from users where 1");
printInfo($stmt);

$stmt = $db->prepare("SELECT count(*) from users where argent < 50000");
printInfo($stmt);

$stmt = $db->prepare("SELECT avg(argent) from users");
printInfo($stmt);

$stmt = $db->prepare("SELECT sum(argent) from users");
printInfo($stmt);

$stmt = $db->prepare("SELECT * FROM users WHERE prenom LIKE 'j%'");
printInfo($stmt);

$stmt = $db->prepare("SELECT * FROM users WHERE prenom like '%s'");
printInfo($stmt);

$stmt = $db->prepare("SELECT * FROM users WHERE prenom like '%a%'");
printInfo($stmt);