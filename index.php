<?php
/* Nesta segunda forma, basta indicar o uso do recurso através do namespace */

use App\Pedidos\Pedido;
// Repare que aqui definimos um apelido (as) para solucionar o conflito de nomes de classe
use App\Relatorios\Pedido as RelatorioPedido;


use App\Pedidos\StatusPedido;

require_once "src/Relatorios/Pedido.php";
require_once "src/Pedidos/StatusPedido.php";
require_once "src/Pedidos/Pedido.php";
require_once "src/Notificacoes/Notificador.php";
require_once "src/Notificacoes/NotificadorEmail.php";

// VEJA QUE NESTA PRIMEIRA FORMA, PRECISAMOS PASSAR O NOME COMPLETO DA CLASSE
$notificadorPorEmail = new App\Notificacoes\NotificadorEmail();

$pedido1 = new Pedido(1001, "Fulano", StatusPedido::Pendente);
$pedido2 = new Pedido(1002, "Beltrano", StatusPedido::Pendente);
$pedido3 = new Pedido(1003, "José da Silva", StatusPedido::AguardandoPagamento);
$pedido4 = new Pedido(1004, "Mônica Santos", StatusPedido::SaiuParaEntrega);

//Alterando o status de acordo com as opções válidas da Enum
$pedido3->setStatus(StatusPedido::Pago);

$pedidos = [$pedido1, $pedido2, $pedido3, $pedido4];

// Criando um objeto a partir da classe Pedido do subnamespace Relatorios
$relatorioPedido1 = new RelatorioPedido(); // repare que usamos o apelido em vez do nome real
$relatorioPedido2 = new App\Relatorios\Pedido(); // também é válido usando nome completo

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
                    <p>Cliente: <?= $pedido->getCliente() ?></p>
                    <p>Status:</p>

                    <!-- Atencao ao uso necessario do value para mostrar os valores -->
                    <b class="destaque"> <?= $pedido->getStatus()->value ?> </b>
                    </p>

                    <?php $mensagem = 'Seu pedido #' . $pedido->getNumero() . ' esta com o status: ' .
                        $pedido->getStatus()->value;
                    ?>
                    <p><small> <?= $notificadorPorEmail->enviar($mensagem) ?></small></p>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="assuntos-estudados">
            <h2>Assuntos estudados</h2>
            <ul>
                <li>Reorganização dos arquivos em pastas dentro de <b>src</b></li>
                <li>Declaração do namespace e do subnamespace em cada arquivo</li>
                <li>Utilização do nome completo de um recurso: <b>App\Pedidos\Pedido</b></li>
                <li>Importação do namespace com <b>use</b> para utilizar nomes simples</li>
                <li>Criação de apelidos com <b>as</b> para solucionar conflitos de nomes</li>
                <li>Lembrete:
                    <b>use</b> importa namespaces;
                    <b>require_once</b> carrega arquivos
                </li>
            </ul>
        </div>
    </div>
</body>

</html>