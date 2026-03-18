<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSCRIPTION LABORATOIRE</title>
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
        <h3>Informations d'inscription du délégué {{$data['name']}} du laboratoire {{$data['labo']}}</h3>
        <p>
          Nombre de stand : <em>{{$data['stand']}}</em> <br>
          Organisation d'un symposium satellite : <em>{{$data['symposium']}}</em> <br>
          Insertion publicitaire : <em>{{$data['publicite']}}</em> <br>
          Nombre de spécialiste pris en charge : <em>{{$data['specialiste']}}</em> <br>
          Nombre de médecin pris en charge : <em>{{$data['medecin']}}</em> <br>
          Nombre d'infirmier pris en charge : <em>{{$data['infirmier']}}</em> <br>
          Nombre d'étudiant pris en charge : <em>{{$data['etudiant']}}</em> <br>


            

         
         
        </p>
        <p>
        


        </p>
        <h3></h3>
    </div>
</body>
</html>