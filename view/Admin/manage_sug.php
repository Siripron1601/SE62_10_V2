<?php
require_once("../../dbConnect.php");
session_start();
if (isset($_POST['delete'])) {
    $id = $_POST['sugid1'];
    $sql = "DELETE FROM `log_suggestion` WHERE log_suggestion.sugid = $id";
    deletedata($sql);
}
