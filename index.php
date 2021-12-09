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
<body style="display:flex; padding-left: 30px; padding-right: 200px; column-gap: 50px;">
<div class="container mt-4">
    <h1>Добавление дороги</h1>
    <form action="add.php" method="GET">
        <input type="text" class="form-control" name="roadname" id="roadname" placeholder="Введите название дороги"  autocomplete = "off" required autofocus><br>
        <input type="number" class="form-control" name="roadlength" id="roadlength" placeholder="Введите длину дороги"  autocomplete = "off" required><br>
        <input type="number" class="form-control" name="roadxstart" id="roadxstart" placeholder="Введите X координату начальной точки дороги"  autocomplete = "off" required><br>
        <input type="number" class="form-control" name="roadystart" id="roadystart" placeholder="Введите Y координату начальной точки дороги"  autocomplete = "off" required><br>
        <input type="number" class="form-control" name="roadxend" id="roadxend" placeholder="Введите X координату конечной точки дороги"  autocomplete = "off" required><br>
        <input type="number" class="form-control" name="roadyend" id="roadyend" placeholder="Введите Y координату конечной точки дороги"  autocomplete = "off" required><br>
        <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <input type="text" class="form-control" name="customername" id="customername" placeholder="Введите имя заказчика"  autocomplete = "off" required><br>
        <input type="text" class="form-control" name="customersname" id="customersname" placeholder="Введите фамилию заказчика"  autocomplete = "off" required><br>
        <input type="email" class="form-control" name="customeremail" id="customeremail" placeholder="customeremail@gmail.com"  autocomplete = "off" required><br>
        <input type="tel" class="form-control" name="customerphone" id="customerphone" placeholder="Введите номер заказчика"  autocomplete = "off" required><br>
        <input type="text" class="form-control" name="customercompany" id="customercompany" placeholder="Введите компанию заказчика"  autocomplete = "off" required><br>
        <button type="submit" class="btn btn-success">Добавить</button>
        <button type="reset" class="btn btn-success">Сброс</button>
        <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    </form>
</div>
<div>

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


        $sqlSelectRoad = 'SELECT * FROM road';
        $resultRoad = mysqli_query($conn, $sqlSelectRoad);
        $road = mysqli_fetch_all($resultRoad);
        
        $str = "<select style='width: 500px; margin-top: 45px;'>"; 
        for($i=0; $i<count($road); $i++){
            $str.="<option value=".$i.">".$road[$i][1].
                "<form action='output.php'><input name='roadname' value=".$road[$i][1]." style='visibility: hidden'><button type='submit'>Открыть информацию о дороге</form>".
            "</option>";
        
        }
        $str.="</select>";
        echo $str;
    ?>
</div>
    </body>    
</html>

