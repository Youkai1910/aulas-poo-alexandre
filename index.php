<?php

require_once "src/Notificador.php"; // interface (vem primeiro)
require_once "src/NotificadorEmail.php"; // classe

require_once "src/StatusPedido.php";
require_once "src/Pedido.php";

// Criando os objetos a partir das classes
$notificadorPorEmail = new NotificadorEmail();

$pedido1 = new Pedido(1001, "Fulano", StatusPedido::Pendente);
$pedido2 = new Pedido(1002, "Beltrano", StatusPedido::Pendente);
$pedido3 = new Pedido(1003, "José da Silva", StatusPedido::AguardandoPagamento);
$pedido4 = new Pedido(1004, "Mônica Santos", StatusPedido::SaiuParaEntrega);

//Alterando o status de acordo com as opções válidas da Enum
$pedido3->setStatus(StatusPedido::Pago);

$pedidos = [$pedido1, $pedido2, $pedido3, $pedido4];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <div class="container">
        <header>
            <p class="destaque">lonja virtual</p>
            <h1>Pedidos da loja virtual</h1>
            <p>Cada possui um status: Pendente, Aguardando pagamento, Em preparação, Pago ou Saiu para entrega</p>
        </header>

        <div class="conteudos">
            <?php foreach ($pedidos as $pedido): ?>
                <article class="card-conteudo">
                    <h2>Pedido # <?= $pedido->getNumero() ?></h2>
                    <p>Cliente:  <?= $pedido->getCliente() ?></p>
                    <p>Status:</p>

                    <!-- Atencao ao uso necessario do value para mostrar os valores -->
                    <b class="destaque"> <?= $pedido->getStatus()->value ?> </b>
                    </p>

                  <?php    $mensagem = 'Seu pedido #'.$pedido->getNumero().' esta com o status: '.
                    $pedido->getStatus()->value;
                    ?>
                    <p><small> <?= $notificadorPorEmail->enviar($mensagem) ?></small></p>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="assuntos-estudados">
            <h2>Assuntos estudados</h2>
            <ul>

            </ul>
        </div>
    </div>
</body>

</html>