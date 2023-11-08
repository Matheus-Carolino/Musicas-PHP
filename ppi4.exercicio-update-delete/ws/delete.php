<?php
$db = new PDO("sqlite:../musicas.sqlite");
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$id = $_GET["id"];

$q = $db->prepare("DELETE from musicas WHERE id=:id");
$q->bindParam(":id", $id);

$q->execute();

header("Location:../");