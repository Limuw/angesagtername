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
<div class="container mt-4">
        
        <div class="row">
            <div class="col"> 
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
            <input type="tel" class="form-control" name="customerphone" id="customerphone" placeholder="Введите имя заказчика"  autocomplete = "off" required><br>
            <input type="text" class="form-control" name="customer" id="customer" placeholder="Введите имя заказчика"  autocomplete = "off" required><br>
            <button type="submit" class="btn btn-success">Ввод</button>
            <button type="reset" class="btn btn-success">Сброс</button>
            <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        </form>
            </div>
          
            </div>
    </div>
</html>

