<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scan badge Afa Respir</title>
</head>

<body>
    <h1>Scan Congrès {{ "Afa Respir Scan participant" }}</h1>
    {{-- <a href="/listes-sessions">Retour sur la liste des sessions</a> --}}

    <!-- QR SCANNER CODE BELOW  -->
    <div class="row" style="max-height: 25vh !important;">
        <div class="col">
            <div id="reader"></div>
        </div>
        <div class="col" style="">
            <h4>Scan Result </h4>
             <div id="result">
                Result goes here
            </div>
            <form action="/save-scan"  method="POST">
                @csrf
                <input type="hidden" name="info_participant" id="info_participant" value="text" required>
                {{-- <input type="hidden" name="session_id" value="{{ $id }}" id="session_id"> --}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <button type="submit" style="padding-left: 10px; padding-rigth: 10px;  font-size: 1.2em; height: 4vh; border: none;">Valider</button>
            </form>
            <br>
            {{-- <a href="/listes-sessions">Retour au menu du scan</a> --}}
        </div>

    </div>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        // When scan is successful fucntion will produce data
        let button = document.querySelector('form button')
        let infoParticipant = document.querySelector('form #info_participant')
        let scan = 0;

        function onScanSuccess(qrCodeMessage) {
            let verification = "";
            let tabPath = qrCodeMessage.split('_')

            /* if(verification[verification.length - 1] == "SECRETARIAT" || || || )*/
            scan++;

            infoParticipant.value = qrCodeMessage;
            button.style.backgroundColor = "#5cb85c"
            button.innerHTML = "Scan participant validé"
            let name = tabPath.lenght > 1 ? tabPath[1] : "NON DEFINI"
            document.getElementById("result").innerHTML =
                '<span class="result">' + tabPath[1] + "</span>";
            let form = document.querySelector('form')
            let data = new FormData(form)
            let xhr = new XMLHttpRequest()
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    let value = xhr.responseText
                    setTimeout(function() {
                         button.style.backgroundColor = "#880505FF"
                        button.innerHTML = "Valider"
                    }, 2000);
                }
            }


            xhr.open("POST", "/save-participant-afa")

            xhr.send(data)

        }

        // When scan is unsuccessful fucntion will produce error message
        function onScanError(errorMessage) {
            // Handle Scan Error
            //console.log(errorMessage)
            if (scan == 0) {
                button.innerHTML = "waiting..."
                button.style.backgroundColor = "#aa0000ff";
                button.style.color = "whitesmoke";
            }
        }

        // Setting up Qr Scanner properties
        if (scan == 0) {
            var html5QrCodeScanner = new Html5QrcodeScanner("reader", {
                fps: 10,
                qrbox: 150
            });
        }


        // in
        html5QrCodeScanner.render(onScanSuccess, onScanError);
    </script>
</body>

</html>
