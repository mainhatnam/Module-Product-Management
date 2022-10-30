<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>
<body>
    <h1>hello word</h1>
<form id="form">
    @csrf
<input type="text" name="name">
<input type="text" name="email">
<input type="text" name="password">
<input type="submit" value="gui">
</form>

<script>
    let rou ="{{ route('user.adduser') }}";
    $(document).ready(function () {
    $('#form').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: rou,
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data2,status,xhr) {
                console.log(data2);        
            },
            error: function (data2) {
                console.log(data2);                     
            }
        });
    });
});
</script>
</body>
</html>

