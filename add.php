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
    //road
    [$_GET["roadname"],//название дороги (imp)
    $_GET["roadlength"],//Общая длина
    $_GET["roadxstart"],//начало X
    $_GET["roadystart"],//начало Y
    $_GET["roadxend"],//конец X
    $_GET["roadyend"]],//конец  y
    //customer 
    [$_GET["customername"],//имя
    $_GET["customersname"],//фамилия
    $_GET["customeremail"],//почта
    $_GET["customerphone"],//номер 
    $_GET["customercompany"]],//компания заказчика
    //Object
    [$_GET["objectnum"],//общее количество
    $_GET["objectstop"],//остановки
    $_GET["objectzebra"]],//пешеходные переходы
    //Lcut
    [$_GET["lcut"]],//largest cut
    //Scut
    [$_GET["scut"]],//smallest cut
    //Type
    [$_GET["typecovering"],//тип покрытия
    $_GET["typeroadside"]],//тип обочины
    //Signs
    [$_GET["signssum"]],//сумма всех знаков вдоль дороги
    //Turn
    [$_GET["turnamount"]],//количество поворотов
    //Direction
    $_GET[["directioncity"]],//направление дороги
    //Feedback
    [$_GET["fbnotes"],//заметки пользователя 
    $_GET["fbmail"],//почта для обратной связи
    $_GET["fbtel"]]//телефон для обратной связи
];

  function idGenerator ($a, $arr) {
    $temp = [];
      for ($i=0; $i<count($arr); $i++){
        $temp[$i] = $arr[$i][0];
      }
      return in_array($a, $temp) ? idGenerator($a + 1, $arr) : $a;
    }


    //  Road+
    $sqlSelectRoad = 'SELECT * FROM road';
    $resultRoad = mysqli_query($conn, $sqlSelectRoad);
    $road = mysqli_fetch_all($resultRoad);

    $sqlInsertRoad = 'INSERT INTO road (id, name, length, xstart, ystart, xend, yend) VALUES ('.idGenerator(0,$road).', \''.$_GET['roadname'].'\', '.$_GET['roadlength'].','.$_GET['roadxstart'].', '.$_GET['roadystart'].', '.$_GET['roadxend'].', '.$_GET['roadyend'].')';
    if ($conn->query($sqlInsertRoad) === TRUE) {
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo json_encode('Error: ' . $sqlInsertRoad . '\n' . $conn->error);
     }

    //  Customer+
     $sqlSelectCustomer = 'SELECT * FROM customer';
    $resultCustomer = mysqli_query($conn, $sqlSelectCustomer);
    $customer = mysqli_fetch_all($resultCustomer);

    $sqlInsertCustomer = 'INSERT INTO customer (id, name, sname, email, phone, company) VALUES ('.idGenerator(0,$customer).', \''.$_GET['customername'].'\', '.$_GET['customersname'].','.$_GET['customeremail'].', '.$_GET['customerphone'].', '.$_GET['customercompany'].')';
    if ($conn->query($sqlInsertCustomer) === TRUE) {
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo json_encode('Error: ' . $sqlInsertCustomer . '\n' . $conn->error);
     }
     //  Object+
     $sqlSelectObject = 'SELECT * FROM object';
    $resultObject = mysqli_query($conn, $sqlSelectObject);
    $object = mysqli_fetch_all($resultObject);

    $sqlInsertObject = 'INSERT INTO object (id, num, stop, zebra) VALUES ('.idGenerator(0,$customer).', \''.$_GET['objectnum'].'\', '.$_GET['objectstop'].','.$_GET['objectzebra'].')';
    if ($conn->query($sqlInsertObject) === TRUE) {
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo json_encode('Error: ' . $sqlInsertObject . '\n' . $conn->error);
     }
     //  Lcut+
     $sqlSelectLcut = 'SELECT * FROM lcut';
    $resultLcut = mysqli_query($conn, $sqlSelectLcut);
    $lcut = mysqli_fetch_all($resultLcut);

    $sqlInsertLcut = 'INSERT INTO lcut (id, lcut) VALUES ('.idGenerator(0,$customer).', \''.$_GET['lcut'].')';
    if ($conn->query($sqlInsertLcut) === TRUE) {
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo json_encode('Error: ' . $sqlInsertLcut . '\n' . $conn->error);
     }
     //  Scut
     $sqlSelectCustomer = 'SELECT * FROM customer';
    $resultCustomer = mysqli_query($conn, $sqlSelectCustomer);
    $customer = mysqli_fetch_all($resultCustomer);

    $sqlInsertCustomer = 'INSERT INTO customer (id, name, sname, email, phone, company) VALUES ('.idGenerator(0,$customer).', \''.$_GET['customername'].'\', '.$_GET['customersname'].','.$_GET['customeremail'].', '.$_GET['customerphone'].', '.$_GET['customercompany'].')';
    if ($conn->query($sqlInsertCustomer) === TRUE) {
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo json_encode('Error: ' . $sqlInsertCustomer . '\n' . $conn->error);
     }
     //  Type
     $sqlSelectCustomer = 'SELECT * FROM customer';
    $resultCustomer = mysqli_query($conn, $sqlSelectCustomer);
    $customer = mysqli_fetch_all($resultCustomer);

    $sqlInsertCustomer = 'INSERT INTO customer (id, name, sname, email, phone, company) VALUES ('.idGenerator(0,$customer).', \''.$_GET['customername'].'\', '.$_GET['customersname'].','.$_GET['customeremail'].', '.$_GET['customerphone'].', '.$_GET['customercompany'].')';
    if ($conn->query($sqlInsertCustomer) === TRUE) {
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo json_encode('Error: ' . $sqlInsertCustomer . '\n' . $conn->error);
     }
     //  Signs
     $sqlSelectCustomer = 'SELECT * FROM customer';
    $resultCustomer = mysqli_query($conn, $sqlSelectCustomer);
    $customer = mysqli_fetch_all($resultCustomer);

    $sqlInsertCustomer = 'INSERT INTO customer (id, name, sname, email, phone, company) VALUES ('.idGenerator(0,$customer).', \''.$_GET['customername'].'\', '.$_GET['customersname'].','.$_GET['customeremail'].', '.$_GET['customerphone'].', '.$_GET['customercompany'].')';
    if ($conn->query($sqlInsertCustomer) === TRUE) {
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo json_encode('Error: ' . $sqlInsertCustomer . '\n' . $conn->error);
     }
     //  Turn
     $sqlSelectCustomer = 'SELECT * FROM customer';
    $resultCustomer = mysqli_query($conn, $sqlSelectCustomer);
    $customer = mysqli_fetch_all($resultCustomer);

    $sqlInsertCustomer = 'INSERT INTO customer (id, name, sname, email, phone, company) VALUES ('.idGenerator(0,$customer).', \''.$_GET['customername'].'\', '.$_GET['customersname'].','.$_GET['customeremail'].', '.$_GET['customerphone'].', '.$_GET['customercompany'].')';
    if ($conn->query($sqlInsertCustomer) === TRUE) {
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo json_encode('Error: ' . $sqlInsertCustomer . '\n' . $conn->error);
     }
     //  Direction
     $sqlSelectCustomer = 'SELECT * FROM customer';
    $resultCustomer = mysqli_query($conn, $sqlSelectCustomer);
    $customer = mysqli_fetch_all($resultCustomer);

    $sqlInsertCustomer = 'INSERT INTO customer (id, name, sname, email, phone, company) VALUES ('.idGenerator(0,$customer).', \''.$_GET['customername'].'\', '.$_GET['customersname'].','.$_GET['customeremail'].', '.$_GET['customerphone'].', '.$_GET['customercompany'].')';
    if ($conn->query($sqlInsertCustomer) === TRUE) {
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo json_encode('Error: ' . $sqlInsertCustomer . '\n' . $conn->error);
     }
     //  Feedback
     $sqlSelectCustomer = 'SELECT * FROM customer';
    $resultCustomer = mysqli_query($conn, $sqlSelectCustomer);
    $customer = mysqli_fetch_all($resultCustomer);

    $sqlInsertCustomer = 'INSERT INTO customer (id, name, sname, email, phone, company) VALUES ('.idGenerator(0,$customer).', \''.$_GET['customername'].'\', '.$_GET['customersname'].','.$_GET['customeremail'].', '.$_GET['customerphone'].', '.$_GET['customercompany'].')';
    if ($conn->query($sqlInsertCustomer) === TRUE) {
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo json_encode('Error: ' . $sqlInsertCustomer . '\n' . $conn->error);
     }
?>