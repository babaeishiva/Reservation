<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="/reservation/RegisterController/addUser/" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend> فرم ثبت نام </legend>
        <label for="f_name">نام</label><br>
        <input type="text" name="name" id="f_name"  minlength="3"><br><br>
        <label for="l_name">نام خانوادگی</label><br>
        <input type="text" name="family" id="l_name"  minlength="3"><br><br>
        <label for="phone"> شماره موبایل</label><br>
        <input type="tel" name="mobile" id="phone" required><br><br>
        <label for="email">ایمیل</label><br>
        <input type="email" name="email" id="email" required><br><br>
        <label for="un">نام کاربری </label><br>
        <input type="text" name="username" id="un" minlength="3" required><br><br>
        <label for="pass"> رمز عبور</label><br>
        <input type="text" name="password" id="pass" minlength="8" required><br><br>
        <label for="confpass"> تایید رمز عبور</label><br>
        <input type="text" name="confirmPassword" id="confpass" minlength="8" required><br><br>
        <input type="submit" name="submit" value="register">
    </fieldset>
</form>
</body>
</html>