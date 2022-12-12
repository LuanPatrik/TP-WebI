<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link rel="stylesheet" href="../../Styles/Event/listagem.css">
</head>
<body>
    <?php 
        require_once '../../DAO/conexao.php';
        require_once '../../DAO/DAOEvento.php';
        $dao = new DAOEvento();
        $lista = $dao->exibirLista();
        $cont = 1;
    ?>
    <?php 
    foreach($lista as $item){
    ?>
    <div class="tabela">
        <div class="imagem">
            <img src="../../Files/<?php echo $item['imagem']; ?>" alt="">
        </div>
        <div class="descricao">
            <h1><?php echo $item['nome'] ?></h1>
            <h2>Data: <?php echo date("d/m/Y", strtotime($item['data_evento']))?></h2>
            <h2>Local: <?php echo $item['cidade']?></h2>
            <h2>Valor: <?php echo $item['valor']?></h2>
            <br>
        </div>
    </div>
    <?php   
        $cont++;
        if ($cont == 3) {
            echo '<br>';
        }
    }
    ?>
</body>
</html>