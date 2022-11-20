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

        foreach($lista as $item)
        {
            echo '
                <div class="tabela">
                    <h1>'.$item['nome'].'</h1>
                    <h2>Data: '.$item['data_evento'].'</h2>
                    <h2>Local: '.$item['cidade'].'</h2>
                    <h2>Valor: '.$item['valor'].'</h2>
                </div>
            ';
            $cont++;
            if ($cont == 3) {
                echo '<br>';
            }
        }
        
    ?>
    
</body>
</html>