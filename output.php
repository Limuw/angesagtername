<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Учет дорог</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
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

        $sqlSelectRoad = 'SELECT * FROM road WHERE name='.$_GET['roadname'].'';
        $resultRoad = mysqli_query($conn, $sqlSelectRoad);
        $road = mysqli_fetch_all($resultRoad);

    ?>
<body style="display:flex; padding-left: 30px; padding-right: 200px; column-gap: 50px;">
<div class="container mt-4">
    <h1>Информация о дороге</h1>
        <label><?php $road[0] ?></label><br>
        <label><?php $road[1] ?></label><br>
        <label><?php $road[2] ?></label><br>
        <label><?php $road[3] ?></label><br>
        <label><?php $road[4] ?></label><br>
        <label><?php $road[5] ?></label><br>
        <label><?php $road[6] ?></label><br>
</div>  
    </body>    
</html>

