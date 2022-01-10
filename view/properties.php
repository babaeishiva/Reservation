<?php
        if(!empty($carProperty)){
     foreach ($carProperty[0] as $item){

?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <link rel="stylesheet" href="/reservation/view/css/propertiesStyle.css">
    <link rel="stylesheet" href="/reservation/view/css/style.css">
    <meta charset="UTF-8">
    <title>HomePage</title>

</head>
<body>
<?php //echo'<div style="background-image: url("../uploads/' . $item->image .'");  "></div>';
//?>
<header >
    <div class="overlay" style="display: flex">
        <div class="login" align="right">
            <a href="/reservation/LoginController/loginPage/" ><input class="enter" type="button" value="ورود "></a>
            <a href="register.php"><input class="enter" type="button" name="register" value="عضویت"></a>        </div>
        <h1 style="margin: 20px 200px;"> Car Reserve</h1>
    </div>
</header><br>
<form action="/reservation/CarReserveController/insertReserveData/" method="post">
<div class="main">
<div class="table" > <table style="width:80%">
    <caption>اطلاعات ماشین: </caption>
        <tr>
            <th>نام ماشین</th>
            <th>پلاک</th>
            <th>رنگ</th>
            <th>کشور سازنده</th>
            <th>سال ساخت</th>
            <th>تعداد سرنشین</th>
        </tr>

        <tr style="height: 70px">

            <td><?php echo $item['name']; ?> </td>

            <td><?php echo $item['plate_number']; ?> </td>

            <td><?php echo $item['color']; ?> </td>

            <td><?php echo $item['manufacturing_country']; ?> </td>

            <td><?php echo $item['construction_year']; ?> </td>

            <td><?php echo $item['seat_number']; ?> </td>
    </tr>
    </table><br><br>
    <?php
    }
    }
        $startDays=[];
        $startTimes=[];
        $endDays=[];
        $endTimes=[];
        if(!empty($carProperty[1])) {
            foreach ($carProperty[1] as $dates) {
                $dateArray = explode(" ", $dates['start_date']);
                $date = $dateArray[0];
                $startDay = substr($date, 8);
                $startTime = $dateArray[1];
                $startTime = substr($startTime, 0, 2);
                $startDays[] = $startDay;
                $startTimes[] = $startTime;

                $dateArray = explode(" ", $dates['end_date']);
                $date = $dateArray[0];
                $endDay = substr($date, 8);
                $endTime = $dateArray[1];
                $endTime = substr($endTime, 0, 2);
                $endDays[] = $endDay;
                $endTimes[] = $endTime;

            }
        }


        ?>
    <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
    <div class="date">
        <lable>تاریخ شروع: </lable>
        <select name="start_date" id="D">
            <?php

            for($i=1 ; $i<=30 ; $i++){
                ?>
                <option <?php   if(in_array($i , $startDays))  {?>  disabled <?php } ?> value='<?php echo "2021-11-" . $i  ?>'><?php echo "2021-11-". $i  ?></option>
                <?php
            }
            ?>
        </select>
        <select name="start_time" id="D">
            <?php for($i=8 ; $i<=23 ; $i++){
                ?>
                <option <?php  if(in_array($i , $startTimes))  {?>  disabled <?php } ?> value='<?php echo $i.":00:00"  ?>'><?php echo $i.":00:00"  ?></option>
                <?php
            }
            ?>
        </select>
    </div><br>

    <div class="date">
        <lable> تاریخ پایان: </lable>
        <select name="end_date" id="D">
            <?php for($i=1 ; $i<=30 ; $i++){
                ?>
                <option <?php   if(in_array($i , $endDays))  {?>  disabled <?php } ?>  value='<?php echo "2021-11-" . $i  ?>'><?php echo "2021-11-". $i  ?></option>
                <?php
            }
            ?>
        </select>
        <select name="end_time" id="D">
            <?php for($i=8 ; $i<=23 ; $i++){
                ?>
                <option <?php  if(in_array($i , $endTimes))  {?>  disabled <?php } ?> value='<?php echo $i.":00:00"  ?>'><?php echo $i.":00:00"  ?></option>
                <?php
            }
            ?>
        </select>

        <input class="submit" type="submit" name="store" value="تایید"><br>
        <a href="/reservation/"><input type="button" name="return" value="بازگشت"></a>
    </div>
</div>
<?php
echo '<div class="image"> <img src=../uploads/' .$item['image'] .'></div><br>';
?>
<?php


?>
</div>
</form>
</body>
</html>