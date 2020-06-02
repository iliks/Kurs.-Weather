<?php
if(!isset($_COOKIE['admin'])){
    header('location: ../index.php');
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>admin room</title>
    <script src="../js/main.js"></script>
    <script src="../js/mainA.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="../index.html" class="navbar-brand">WEATHER</a>

            </div>
            <a href="addAdmin.php" class="justify-content-end btn btn-dark">Add Admin</a>
            <a href="logout.php" class="justify-content-end btn btn-dark">logout</a>
        </div>
    </nav>
</header>
<div class="container-fluid" style="margin-top: 10px;">
    <input type="text" id="cityName" placeholder="City name: "><br><br>
    <input type="text" id="cityURL" placeholder="URL on weaf.ru"><br><br>
    <button class="btn" onclick="addCity()">Добавить</button>
</div>
<div class="container" style="display: flex;justify-content: center;margin-top: 10px">
    <table class="text table table-borderless">
        <thead>
        <tr>
            <th scope="col">Город</th>
            <th scope="col">Температура</th>
            <th scope="col">Атмосферные явления</th>
            <th scope="col">Ветер</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody id ="content">
        </tbody>
    </table>
</div>
<script>
    let getData = function () {
        $.get('data.php', viewTableA)
    };
    setInterval(getData,2000)
</script>
</body>
</html>