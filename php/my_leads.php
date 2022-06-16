<?php
include('../vue/base.php');
include('../class/bdd.php');
$id = $_SESSION['id'];

$cl = lister_csv_byuser($id);
include('../vue/vlister.php');
