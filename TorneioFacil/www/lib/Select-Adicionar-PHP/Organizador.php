<?php
    include("../../modulos/Conexao.php");
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Organizador</title>
</head>
<body>
    <a href="../../index.php">Voltar para o inicio</a>
    <h1>Cadastrar Organizador</h1>
    <form method="POST" action="Organizador.php">
    <input type="varchar" name="cpf" id="nome" placeholder="Digite o cpf" required><br><br>
    <input type="text" name="nome" id="nome" placeholder="Digite o nome" required><br><br>
    <input type="text" name="telefone" id="nome" placeholder="Digite o telefone"><br><br>
    <input type="email" name="email" id="nome" placeholder="Digite o email, ex: exemplo@gmail.com"><br><br>
    <input type="int" name="id_torneio" id="nome" placeholder="Digite o ID do torneio" required><br><br>


        <input type="submit" class="btn btn-outline-primary" id="exampleFormControlInput1" name="BotaoEnviar" value="Enviar">
    </form>
</body>
</html>

<?php
    if( isset($_POST['BotaoEnviar']) ){

    $cpf = $_POST["cpf"];
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $id_torneio = $_POST["id_torneio"];

    $buscar_id = "SELECT * from torneio where id_torneio = '$id_torneio' ";
    $verificar_busca = $pdo->prepare($buscar_id);
    $verificar_busca->execute();
    $numRegistros = $verificar_busca->fetch(PDO::FETCH_ASSOC);

    if( $numRegistros == 0){
        //Se não achou no banco de dados o ID do torneio fornecido
        echo "<script>alert('ID de torneio não encontrado');</script>";
    }else{
        //Se achou ele adiciona
        $query_Organizador = "INSERT INTO organizador (cpf, nome, telefone, email, id_torneio ) VALUES ('$cpf', '$nome', '$telefone', '$email', '$id_torneio')";
        $cad_Organizador = $pdo->prepare($query_Organizador);
        $cad_Organizador->execute();
            if( $cad_Organizador->rowCount() ){
                //se conseguiu cadastrar
                echo "<script>alert('Organizador cadastrado!');</script>";
            }else{
                echo "<script>alert('Erro: Organizador não cadastrado!');</script>";
            }
    }

    }
?>