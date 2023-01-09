<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<script>
    function dat_hang(){
        $.ajax({
            type:'post',
            url:'ban.php',
            data:{
                ban:"dat_mon"
            },
            success:function(response) {
                alert(response)
            }
        })
    }
</script>
<body>
<button onclick="dat_hang()">GOijmo </button>

</body>
</html>
