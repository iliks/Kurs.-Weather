<?php
$msg = '';
if(isset($_COOKIE['admin'])){
    header('location: admin.php');
}
if (isset($_POST['user'])){
    if(!empty($_POST['user']) and !empty($_POST['psw'])){
        $data = json_decode(file_get_contents('../assets/users.json'));
        foreach ($data as $key=>$value){
            if($value->user === $_POST['user']){
                $psw = md5($value->salt.$_POST['psw']);
                if($psw === $value->psw){
                    setcookie('admin', true, time()+60*60);
                    header('refresh: 0 admin.php');
                    break;
                }
            }
        }
        $msg ='<h class="alert alert-danger">who are u???!</h>';
        header('refresh: 0 ../index.html');
        exit();
    }
    else{
        $msg ='<h class="alert alert-danger">Empty fields!</h>';
        header('refresh: 0 ../index.html');
        exit();
    }
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign in</title>
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
        </div>
    </nav>
</header>
<main style="margin-top: 30px;">
    <div class="container">
        <form align="center" method="post">
            <span ><?php echo $msg?></span><br><br>
            <input type="text" name="user" placeholder="User name"><br><br>
            <input type="password" name="psw"  placeholder="Password"><br><br>
            <input type="submit" class="btn btn-info" value="Log in"><br>
        </form>
    </div>
</main>
</body>
</html>
