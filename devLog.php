<?php 
require 'connect.php';


if(isset($_POST['loginSub'])) {

    $query = mysqli_query($link,"SELECT * FROM developers WHERE email = '".$_POST['email']."'");
    $data = mysqli_fetch_assoc($query);

    if($data['password'] === $_POST['password'])
    {
        header('Location: forDevelop.php'); 
        session_start();
        $_SESSION['id'] = (int)$data['id'];
        $_SESSION['name'] = $data['name'];
        $_SESSION['surname'] = $data['surname'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['password'] = $data['password'];
    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }

}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
    <title>Войти</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 </head>
 <body>
    <div class="container">
        <div class="row text-center mt-5">
            <h1><b>Войти для разработчика</b></h1>
        </div>
        <div class="row mt-5">
            <form action="devLog.php" method="post">
                <div class="input-group mb-3 px-3">
                    <input type="email" class="form-control" placeholder="Электронная почта" aria-label="email" aria-describedby="basic-addon1" name="email">
                </div>
                <div class="input-group mb-3 px-3">
                    <input type="password" class="form-control" placeholder="Пароль" aria-label="password" aria-describedby="basic-addon1" name="password">
                </div>
                <div class="row mb-3 px-3 text-center">
                    <button type="submit" class="btn btn-spec" name="loginSub">Войти</button>
                </div>
            </form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> 
 </body>
 </html>