<?php
$db = new PDO("sqlite:database.sqlite");
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$modelo = "HB20";
$marca = "Hyundai";
$ano = 2023;
$km = 0;

$q = $db->prepare("INSERT INTO carros (modelo, marca, ano, km)
    VALUES (:modelo, :marca, :ano, :km)");

$q->bindParam(":modelo", $modelo);
$q->bindParam(":marca", $marca);
$q->bindParam(":ano", $ano);
$q->bindParam(":km", $km);

//$q->execute();

$query = $db->query("select * from carros");
$carros = $query->fetchAll();

echo "<pre>";
print_r($carros);
echo "</pre>";

$query = $db->query("select * from carros");
echo "<ol>";
    while($carro = $query->fetchObject()){
        echo "<li>".$carro->modelo."</li>";
    }
echo "</ol>";

$id = 3;
$query = $db->prepare("select * from carros where id=:id");
$query->bindParam(":id", $id);

$query->execute();

$carro = $query->fetchObject();
print_r($carro);

$id = 2;
$query = $db->prepare("delete from carros where id=:id");
$query->bindParam(":id", $id);

//$query->execute();

$km = 12000;
$id = 3;

$query = $db->prepare("update carros set km=:km where id=:id");

$query->bindParam(":km", $km);
$query->bindParam(":id", $id);

$query->execute();

