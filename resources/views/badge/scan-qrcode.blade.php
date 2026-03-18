<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>BIENVENUE AU 4<sup>ème</sup>de la SOCEDIAMN</h1>
    <h2>QR Code Reader</h2>


    <!-- QR SCANNER CODE BELOW  -->
    <div class="row">
        <div class="col">
            <div id="reader"></div>
        </div>
        <div class="col" style="padding: 30px">
            <h4>Scan Result </h4>
            {{--  <div id="result">
                Result goes here
            </div>  --}}
            <form action="/salle-stand" method="POST">
                @csrf
                <input type="hidden" name="info_participant" id="info_participant" value="text">
                <input type="hidden" name="salle" value="salle d'exposition" id="salle">
                <button type="submit" style="padding-left: 10px; padding-rigth: 10px;  font-size: 1.2em; height: 4vh; border: none;">Valider</button>
            </form>
        </div>

    </div>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        // When scan is successful fucntion will produce data
        let button = document.querySelector('form button')
        let infoParticipant = document.querySelector('form #info_participant')
        function onScanSuccess(qrCodeMessage) {
            /*let data = new FormData()
            let xhr = new XMLHttpRequest()
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    let value = xhr.responseText
                    
                }
            }

            data.append('info_participant', qrCodeMessage)
            data.append('salle', "salle d'exposition")
            xhr.open("POST", "/salle-stand")
            xhr.send(data)*/
            infoParticipant.value = qrCodeMessage;
            button.style.backgroundColor = "#5cb85c"
            button.innerHTML = "Valider"
            /*document.getElementById("result").innerHTML =
                    '<span class="result">' + qrCodeMessage + "</span>";*/
        }

        // When scan is unsuccessful fucntion will produce error message
        function onScanError(errorMessage) {
            // Handle Scan Error
            //console.log(errorMessage)
            button.innerHTML = "waiting..."
            button.style.backgroundColor = "#aa0000ff";
            button.style.color = "whitesmoke";
        }

        // Setting up Qr Scanner properties
        var html5QrCodeScanner = new Html5QrcodeScanner("reader", {
            fps: 10,
            qrbox: 300
        });

        // in
        html5QrCodeScanner.render(onScanSuccess, onScanError);
    </script>
</body>

</html>
