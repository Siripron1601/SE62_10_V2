<?php
require_once('../../dbConnect.php');
$action = $_POST['action'] ?? "";


if (isset($_POST['add'])) {
    $category = $_POST['cName'];



    $sqluser = "INSERT INTO `db_category`(`cid`, `cName`) VALUES (NULL,$category)";
    echo $sqluser;
    addinsertData($sqluser);



    // header("location: ./category.php");
}
