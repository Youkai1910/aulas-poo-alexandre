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

            <article class="card-conteudo">
               
            </article>

        </div>
       
        <div class="assuntos-estudados">
            <h2>Assuntos estudados</h2>
            <ul>
                
            </ul>
        </div>
    </div>
</body>

</html>