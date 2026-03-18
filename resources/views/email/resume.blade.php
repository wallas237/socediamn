<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONFIRMATION PRE-INSCRIPTION</title>
    <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
  <img src="https://socediamn.cm/img/socediamn.png"
  alt='inscription à 4ème Congrès de la SOCEDIAMN' />
    <div class="mail">
        <h3>Bonjour {{$data['civilite']." ".$data['name']}} </h3>
        <p>
            Nous accusons bonne réception de votre résumé, Portant sur <h2>{{$data['titre']}}</h2>
            Nous vous remercions pour votre implication.
            Sachez que vous avez la possibilité de soumettre plus d’un. 
           

         
         
        </p>
        <p>
        


        </p>
        <h3></h3>
    </div>
</body>
</html>