<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>HomePage</title>
    <link rel="stylesheet" href="view/css/style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Dancing+Script" />
</head>

<body>
<header>
    <div class="overlay" style="display: flex;">
        <div class="login" align="right">
            <a href="/reservation/LoginController/loginPage/" ><input class="enter" type="button" value="ورود "></a>
            <a href="/reservation/RegisterController/registerPage/"><input class="enter" type="button" name="register" value="عضویت"></a>
            <?php if(isset($_SESSION['username'])){
                echo  $_SESSION['username'];
            } ?>
            <h1 style="margin: -50px 400px;"> Car Reserve</h1>
        </div>
    </div>
</header>
<div class="cars">

    <?php
    if(!empty($cars)) {
        foreach ($cars as  $items=>$item ){


            echo '<div> <img src= uploads/' .$item['image'] .'></div><br>';
            ?>
            <div class="button">
                <form action="/reservation/properties/"  method="post">
                    <button  type="submit" name="name" value="<?php   echo "".$item['name'] ; ?>" ><?php   echo "".$item['name'] ; ?></button>

                </form>
            </div><br><br><br>



            <?php
        }
    }
    else echo "result  0";

    ?>


</div>

</body>
</html>


