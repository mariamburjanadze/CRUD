<?php

session_start();

$mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli->error));
$id = 0;
$name = '';
$surname = '';
$birthday = '';
$update = false;


if (isset($_POST['save'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthday = $_POST['birthday'];


    $mysqli-> query("INSERT INTO data(name, surname, birthday) VALUES('$name', '$surname', '$birthday')") or
    die($mysqli->error);
  
    header('Location:index.php');

}
if (isset($_GET["delete"])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error);
  
    header('Location:index.php');
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * from data where id=$id") or die($mysqli->error());
    $update = true;
    if(is_countable($result))$result = Array() and count($result)==1 ;{
        $row = $result->fetch_array();
        $name = $row['name'];
        $surname = $row['surname'];
        $birthday = $row['birthday'];
    }
}
if (isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthday = $_POST['birthday'];

    $mysqli->query("UPDATE data SET name = '$name', surname = '$surname', birthday = '$birthday' WHERE id=$id") or die($mysqli->error);
    header('Location:index.php');

}

?>