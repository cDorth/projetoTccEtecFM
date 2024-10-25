<form action="" method="post">
    <input type="float" name="mensagem">
    <input type="submit" value="Enviar">
</form>

<?php
session_start();
include ('conecta.php');
include ('hora.php');

if (isset($_POST['mensagem'])) {

    $valor = $conexao->real_escape_string($_POST['mensagem']) - 1;
    $horario = $DateAndTime;
    $horario = date('y-m-d H:i:s');

    if ($valor > 0.75 && $valor < 1.25) {
        $risco = "Baixo";
        
    } else if ($valor > 0.5 && $valor <=0.74 || $valor > 1.26 && $valor <= 1.5) {
        $risco = "Médio";
    } else {
        $risco = "Alto";
    }


    if ($risco != "Baixo") {
        $sql = "INSERT INTO leitura (Horario, Risco, Valor) VALUES (?, ?, ?)";
        $dec = $conexao->prepare($sql);
        $dec->bind_param("ssd", $horario, $risco, $valor);

        if ($dec->execute()) {
            echo "Dados inseridos com sucesso!<br>";
        } else {
            echo "Erro ao inserir dados: " . $dec->error . "<br>";
        }

    }
    

    //============================================================================

    if (!isset($_SESSION['varFinal'])) {
        $_SESSION['varFinal'] = [
            'valor' => [],
            'varHorario' => []
        ];
    }
    
    $_SESSION['varFinal']['valor'][] = $valor;
$_SESSION['varFinal']['varHorario'][] = $horario;

if (count($_SESSION['varFinal']['valor']) > 20) {
    array_shift($_SESSION['varFinal']['valor']);    
    array_shift($_SESSION['varFinal']['varHorario']); 
}

echo json_encode($_SESSION['varFinal']['valor']);
echo json_encode(count($_SESSION['varFinal']['valor']));

}


?>
