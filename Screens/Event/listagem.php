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
            <img height="100" src="../../Files/<?php echo $item['imagem']; ?>" alt="">
            <h1><?php echo $item['nome'] ?></h1>
            <h2>Data: <?php echo date("d/m/Y", strtotime($item['data_evento']))?></h2>
            <h2>Local: <?php echo $item['cidade']?></h2>
            <h2>Valor: <?php echo $item['valor']?></h2>
            <br>
        </div>
        <?php   
            $cont++;
            if ($cont == 3) {
                echo '<br>';
            }
        }
        ?>

    <!-- <?php

        foreach($lista as $item)
        {
            echo '
                <div class="tabela">
                    <img height="100" src"'.$item['imagem'].'">
                    <h1>'.$item['nome'].'</h1>
                    <h2>Data: '.date("d/m/Y", strtotime($item['data_evento'])).'</h2>
                    <h2>Local: '.$item['cidade'].'</h2>
                    <h2>Valor: '.$item['valor'].'</h2>
                </div>
            ';
            $cont++;
            if ($cont == 3) {
                echo '<br>';
            }
        }
        
    ?> -->
</body>
</html>