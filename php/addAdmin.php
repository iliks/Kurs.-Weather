<?php
if(!isset($_COOKIE['admin'])){
    header('location: ../index.php');
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>admin room</title>
<!--    <script src="/js/main.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
<script>
    let sendData = function () {
        let user =  document.getElementById('user').value;
        let psw1 = document.getElementById('psw1').value;
        let psw2 = document.getElementById('psw2').value;
        if ((psw1 === psw2) && psw1 && user){
            $.ajax({
                url:'data.php',
                type:'POST',
                data:JSON.stringify({type:'newUser', user:user, pass:psw1}),
                success:()=>{
                    alert('Admin added!')
                },
                error:()=>{
                    console.log('has been error')
                }
            })
        }
    }
</script>
<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="../index.html" class="navbar-brand">WEATHER</a>

            </div>
            <a href="logout.php" class="justify-content-end btn btn-dark">logout</a>
        </div>
    </nav>
</header>
</div>
<form align="center" method="POST">
    <input type="text" name="" id="user" placeholder="Admin name"><br><br>
    <input type="password" id="psw1" placeholder="Password"><br><br>
    <input type="password" id="psw2" placeholder="Confirm password"><br><br>
    <input type="button" class="btn btn-primary" onclick="sendData()" value="add">
</form>
</body>

</html>
