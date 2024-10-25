<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
    <title>TCC</title>
</head>
<body>

    <div class="container">
        <section id="secInic">
            <h1 class="h1Risc">RISCO:</h1>
            <div class="risco">
                <div id="iconVeri">
                <img  src="imagens/iconVeri.svg" alt="icone representativo para deslizamento">
                <span id="risco"  name="risco">
                <?php
                    if (isset($_SESSION['risco'])) {
                        echo $_SESSION['risco']; 
                    } else {
                        echo "NENHUM"; 
                    }
                    ?>
                </span>

            </div>
            <div class="local">
                <img src="imagens/iconMap.svg" alt="">
                <span id="endereço">endereço</span>
            </div>

            </div>

        </section>
        <section id="secSec">
                <h1>Recomendação</h1>
            <div class="recomendacao">
                <img src="imagens/iconAlert.svg" alt="">
                <span>
                    &emsp;&emsp; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam turpis nisi, mollis id cursus vel, feugiat ut ex. Vestibulum congue nec urna lacinia semper. Quisque ornare lorem posuere, blandit mauris ac, egestas diam. Integer ornare tincidunt odio in, elementum condimentum ipsum. Quisque egestas purus vitae ex convallis gravida. Maecenas dictum  Curabitur elit libero.
                </span>
            </div>
        </section>
    </div>
</body>
</html>

