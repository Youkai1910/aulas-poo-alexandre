<?php
<rphp
require_once "src/Notificador.php"; // interface (vem primeiro)
require_once "src/NotificadorEmail.php"; // classe
require_once "src/NotificadorSMS.php"; // classe

// Criando os objetos a partir das classes
$notificadorPorEmail = new NotificadorEmail();
$notificadorPorSMS = new NotificadorSMS();

$notificadores = [$notificadorPorEmail, $notificadorPorSMS];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificações da loja virtual</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <div class="container">
        <header>
            <p class="destaque">lonja virtual</p>
            <h1>Notificações da loja virtual</h1>
            <p>Simulação de notificações sobre pedidos por e-mail e SMS</p>
        </header>

        <div class="conteudos">
            $conteudoDaMensagem = "Seu pedido '123abc' foi confirmado"
            <?php foreach($notificadores as $notificador):
            ?>
                <article class="card-conteudo">
                <h2>Notificação sobre o pedido: </h2>
                <p> <?= $notificador->enviar($conteudoDaMensagem) ?> </p>
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