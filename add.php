<?php
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

  function idGenerator ($a, $arr) {
    $temp = [];
      for ($i=0; $i<count($arr); $i++){
        $temp[$i] = $arr[$i][0];
      }
      return in_array($a, $temp) ? idGenerator($a + 1, $arr) : $a;
    }



    $sqlSelectRoad = 'SELECT * FROM road';
    $resultRoad = mysqli_query($conn, $sqlSelectRoad);
    $road = mysqli_fetch_all($resultRoad);

    $sqlInsertRoad = 'INSERT INTO road (id, name, length, xstart, ystart, xend, yend) VALUES ('.idGenerator(0,$road).', \''.$_GET['roadname'].'\', '.$_GET['roadlength'].','.$_GET['roadxstart'].', '.$_GET['roadystart'].', '.$_GET['roadxend'].', '.$_GET['roadyend'].')';
    if ($conn->query($sqlInsertRoad) === TRUE) {
        echo json_encode('New record created successfully');
    } else {
        echo json_encode('Error: ' . $sqlInsertRoad . '\n' . $conn->error);
     }


     $sqlSelectRoad = 'SELECT * FROM road';
    $resultRoad = mysqli_query($conn, $sqlSelectRoad);
    $road = mysqli_fetch_all($resultRoad);

    $sqlInsertRoad = 'INSERT INTO road (id, name, length, xstart, ystart, xend, yend) VALUES ('.idGenerator(0,$road).', \''.$_GET['roadname'].'\', '.$_GET['roadlength'].','.$_GET['roadxstart'].', '.$_GET['roadystart'].', '.$_GET['roadxend'].', '.$_GET['roadyend'].')';
    if ($conn->query($sqlInsertRoad) === TRUE) {
        echo json_encode('New record created successfully');
    } else {
        echo json_encode('Error: ' . $sqlInsertRoad . '\n' . $conn->error);
     }
  

  


  



  header('Location: ' . $_SERVER['HTTP_REFERER']);



?>