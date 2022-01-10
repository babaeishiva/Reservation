
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>HomePage</title>

</head>
<body>

<p>لطفا تعداد مسافر ها را انتخاب نمایید: </p>
<input id="pn" type="number" name="passengers" max="4"><br><br>
<button type="button" onclick="passengers()">Try it</button><br><br>
<form id="form" action="/reservation/PassengerController/addPassengers/" method="post">
</form>
<script>

    function passengers(){
        var num= document.getElementById("pn").value;
        for(var i=1 ; i<=num ; i++){
            var name = document.createElement("label");
            name.innerHTML= 'نام:  ';
            var x = document.createElement("INPUT");
            x.setAttribute("type", "text");
            x.setAttribute("value", "");
            x.setAttribute("name", "name"+i);
            var br = document.createElement("br");
            var brr = document.createElement("br");
            document.getElementById("form").appendChild(name);
            document.getElementById("form").appendChild(x);
            document.getElementById("form").appendChild(br);
            document.getElementById("form").appendChild(brr);


        }
        var brrr = document.createElement("br");
        var button= document.createElement("input");
        button.setAttribute("type", "submit")
        button.setAttribute("value" , "تایید")
        document.getElementById("form").appendChild(brrr);
        document.getElementById("form").appendChild(button)

    }



</script>

</form>
</body>
</html>
