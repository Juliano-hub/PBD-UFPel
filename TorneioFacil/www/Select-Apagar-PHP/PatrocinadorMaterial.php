<?php
    include("../Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Patrocinador Material</title>
</head>
<body>
    <a href="../index.php">Voltar para o inicio</a>
    <h1>Patrocinador Material</h1>
    <form method="POST" action="PatrocinadorMaterial.php">

    <input type="text" name="id" id="id" placeholder="Digite o ID para Apagar" required><br><br>

        <input type="submit" class="btn btn-outline-primary" id="exampleFormControlInput1" name="BotaoEnviar" value="Enviar">
    </form>
</body>
</html>

<?php
if( isset($_POST['BotaoEnviar']) ){

    // verifica se já foi enviado algo pelo formulário

    $id = $_POST["id"] + 0;
    // + 0 força ele p converter a int

    $query_resultado = "SELECT * FROM patrocinadormaterial WHERE id_patrocinio = $id LIMIT 1";
    $resultado = $pdo->prepare($query_resultado);
    $resultado->execute();

    if( ($resultado) AND ($resultado->rowCount() != 0) ){
    $remover = "DELETE FROM patrocinadormaterial WHERE  id_patrocinio = $id";
    $apagar = $pdo->prepare($remover);

    if( $apagar->execute() ){
        echo "<script>alert('Patrocinador Material apagado com sucesso!');</script>";
    }else{
        echo "<script>alert('Erro: Patrocinador Material não apagado!');</script>";
    }


}
?>