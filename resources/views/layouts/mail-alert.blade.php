<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>{{ config('app.name', 'Dr LESIM') }}</title>
    <style>
        body{
            background-color: "#008000";
        }
       
    </style>
</head>

<body>
    <!-- Main table -->
    <br>
    <div class="container text-center">
        <img src="/assets/images/lesim.jpeg" style="width: 25%;" alt="">
        
    </div>
    <br>
    <main>
    
        {{ $slot }}

    </main>
    
    <!-- / Main table -->
</body>

</html>
