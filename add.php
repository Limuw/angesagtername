<?php
$arr = [
    [$_GET["roadname"],
    $_GET["roadlength"],
    $_GET["roadxstart"],
    $_GET["roadystart"],
    $_GET["roadxend"],
    $_GET["roadyend"]],
    // 
    [$_GET["customername"],
    $_GET["customersname"],
    $_GET["customeremail"],
    $_GET["customerphone"],
    $_GET["customercompany"]]
];



$cleardb_url = parse_url(getenv('CLEARDB_DATABASE_URL'));
$cleardb_server = $cleardb_url['host'];
  $cleardb_username = $cleardb_url['user'];
  $cleardb_password = $cleardb_url['pass'];
  $cleardb_db = substr($cleardb_url['path'],1);
  $active_group = 'default';
  $query_builder = TRUE;

  $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
  if ($conn -> connect_error) {
    echo json_encode('died from cringe  ');
    die('Connection failed: ' . $conn -> connect_error);
  }
?>