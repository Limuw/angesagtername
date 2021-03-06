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
<body style="display:flex; padding-left: 30px; padding-right: 200px; column-gap: 50px; 
    background: url(./background.jpg) !important;
    background-size: 100% !important;
    background-repeat: no-repeat !important;
    background-attachment: fixed !important;
    background-position: 0 0 !important">



<div class="container mt-4">
    
    <form action="add.php" method="GET" style="background: rgba(110,85,132,0.58); padding-left: 20px; padding-right: 20px; border-radius: 10px; backdrop-filter: blur(5px); ">
        <!-- Road---------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <h1 style="color: #fff">Добавление дороги</h1>
        <h3 style="color: #fff">Основная информация</h3>
        <input type="text" class="form-control" name="roadname" id="roadname" placeholder="Введите название дороги"  autocomplete = "off" required autofocus><br>
        <input type="number" class="form-control" name="roadlength" id="roadlength" placeholder="Введите длину дороги"  autocomplete = "off" required><br>
        <input type="number" class="form-control" name="roadxstart" id="roadxstart" placeholder="Введите X координату начальной точки дороги"  autocomplete = "off" required><br>
        <input type="number" class="form-control" name="roadystart" id="roadystart" placeholder="Введите Y координату начальной точки дороги"  autocomplete = "off" required><br>
        <input type="number" class="form-control" name="roadxend" id="roadxend" placeholder="Введите X координату конечной точки дороги"  autocomplete = "off" required><br>
        <input type="number" class="form-control" name="roadyend" id="roadyend" placeholder="Введите Y координату конечной точки дороги"  autocomplete = "off" required><br>
        <!-- Customer---------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <h3 style="color: #fff">Информация о заказчике</h3>
        <input type="text" class="form-control" name="customername" id="customername" placeholder="Введите имя заказчика"  autocomplete = "off" required><br>
        <input type="text" class="form-control" name="customersname" id="customersname" placeholder="Введите фамилию заказчика"  autocomplete = "off" required><br>
        <input type="email" class="form-control" name="customeremail" id="customeremail" placeholder="customeremail@gmail.com"  autocomplete = "off" required><br>
        <input type="tel" class="form-control" name="customerphone" id="customerphone" placeholder="Введите номер заказчика"  autocomplete = "off" required><br>
        <input type="text" class="form-control" name="customercompany" id="customercompany" placeholder="Введите компанию заказчика"  autocomplete = "off" required><br>
        <!-- Object---------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <h3 style="color: #fff">Основная об объектах</h3>
        <input type="number" class="form-control" name="objectnum" id="objectnum" placeholder="Введите количество объектов вдоль дороги"  autocomplete = "off" required><br>
        <input type="number" class="form-control" name="objectstop" id="objectstop" placeholder="Введите количество остановок вдоль дороги"  autocomplete = "off" required><br>
        <input type="number" class="form-control" name="objectzebra" id="objectzebra" placeholder="Введите количество переходов вдоль дороги"  autocomplete = "off" required><br>
        <!-- Lcut---------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <h3 style="color: #fff">Справочная информация</h3>
        <input type="number" class="form-control" name="lcut" id="lcut" placeholder="Введите длинну самого большого отрезка"  autocomplete = "off" required><br>
        <!-- Scut---------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <input type="number" class="form-control" name="scut" id="scut" placeholder="Введите длинну самого маленького отрезка"  autocomplete = "off" required><br>
        <!-- Type---------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <input type="text" class="form-control" name="typecovering" id="typecovering" placeholder="Введите материал дороги"  autocomplete = "off" required><br>
        <input type="text" class="form-control" name="typeroadside" id="typeroadside" placeholder="Введите материал обочины"  autocomplete = "off" required><br>
        <!-- Signs---------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <input type="number" class="form-control" name="signssum" id="signssum" placeholder="Введите количество знаков вдоль дороги"  autocomplete = "off" required><br>
        <!-- Turn---------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <input type="number" class="form-control" name="turnamount" id="turnamount" placeholder="Введите количество поворотов вдоль дороги"  autocomplete = "off" required><br>
        <!-- Direction---------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <input type="text" class="form-control" name="directioncity" id="directioncity" placeholder="Введите направление дороги"  autocomplete = "off" required><br>
        <!-- Feedback---------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <h3 style="color: #fff">Обратная связь</h3>
        <input type="text" class="form-control" name="fbnotes" id="fbnotes" placeholder="Примечание для обратной связи"  autocomplete = "off" required><br>
        <input type="email" class="form-control" name="fbmail" id="fbmail" placeholder="feedback@gmail.com"  autocomplete = "off" required><br>
        <input type="tel" class="form-control" name="fbtel" id="fbtel" placeholder="Введите телефон для обратной связи"  autocomplete = "off" required><br>
        <button class="btn btn-success">Добавить</button>
        <input class="btn btn-danger"type="reset">
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
        
        $str = '<div style="background: rgba(110,85,132,0.58); margin: 20px 20px; padding: 20px; border-radius: 10px; backdrop-filter: blur(5px);">'; 
        for($i=0; $i<count($road); $i++){
            $str.="<form action='output.php'>".$road[$i][1]."<input name='roadname' value=".$road[$i][1]." style='visibility: hidden; width: 0px;'><button class='btn btn-success'; type='submit'>Открыть</button></form><hr>";
        
        }
        $str.='</div>';
        echo $str;
    ?>
</div>
    </body>    
</html>

