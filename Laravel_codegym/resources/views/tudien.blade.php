<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/tudien" method="post" >
        @csrf
        <p>Nhập : <input type="text" name="english" placeholder="English"></p>
        <input type="submit" value="Dịch">
    </form>
</body>
</html>