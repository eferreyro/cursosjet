<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<style>
    .bgImage{
        background: rgb(238,174,202);
        background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
        background-repeat: no-repeat;
        background-size: auto;
    }
    h1{
        color:#9932cc;
    }

</style>
</head>
<body>
    <div class="bgImage">
    <h1 class="colorH1">Este es un email de prueba</h1>
    <p>El curso <strong>{{$course->title}}</strong> se ha publicado con exito</p>
    </div>
</body>
</html>