
<!doctype html>
<html lang="en" dir="rtl">
<head>
    <link rel="stylesheet" href="css/s.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="wrapper">
<form action="/reservation/LoginController/loginAction/" method="post">

        <h1>فرم ورود اعضا </h1>
        <label>نام کاربری: </label><input type="text" name="username"><br><br>
        <label>رمز عبور: </label><input type="password" name="password"><br><br>
         <p> <?php if (isset($_GET['message'])) echo ($_GET['message']); ?></p><br><br>
        <input type="submit" name="submit" value="login">

</form>
</div>


</body>
</html>