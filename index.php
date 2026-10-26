<?php
// Importando a superclass/pai: Conteudo
require_once "src/Conteudo.php";

//Importando a subclass/filha (que herda de Conteudo)
require_once "src/Filme.php";

require_once "src/Serie.php";

// Criando os objetos e passando os dados para o construtor
$serie1 = new Serie("Breaking Bad", "Drama", 2008, 5);
$serie2 = new Serie("Stranger Things", "Ficção Científica", 2016, 4);

$series = [$serie1, $serie2];

//echo "<pre>"; 
//var_dump($serie1);
//var_dump($serie2);
//echo "</pre>";

$filme1 = new Filme('De Volta para o Futuro', 'Ficção', 1985, 116);

$filme2 = new Filme('Toy Story', 'Animação', 1995, 105);

$filme3 = new Filme('Homem Aranha', 'Ação', 2026, 145);

//echo "<prev>";
//var_dump($filme1, $filme2, $filme3);
//echo "</prev>";
$filmes = [$filme1, $filme2, $filme3];

/* Como a classe Conteudo foi definida como abstrata, a linha abaixo não funcionará pois não é possivel criar objetos / insntancias diretamente a partir de classes abstratas. */
//$conteudo = new Conteudo('Senhor dos aneis', 'Fantasia', 2001);
//var_dump($conteudo);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Coleção de Filmes</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <div class="container">
        <header>
            <p class="destaque">Uma sessão de boas histórias</p>
            <h1>Minha coleção de filmes</h1>
            <p>Três filmes para descobrir, rever e se divertir</p>
        </header>

        <div class="filmes">

            <?php foreach ($filmes as $filme): ?>

                <article class="card-filme">
                    <span class="genero"> <?= $filme->getGenero() ?> </span>
                    <h2> <?= $filme->getTitulo() ?> </h2>
                    <p class="ano">Lancamento: <?= $filme->getANO() ?> </p>

                    <p><?= $filme->getDescricao() ?></p>

                    <?php if ($filme->ehClassico()): ?>
                        <span class="classico">Clássico</span>
                    <?php endif; ?>
                </article>

            <?php endforeach; ?>

        </div>

        <hr>
        <div class="series">
            <?php foreach ($series as $serie): ?>
                <article class="card-serie">
                    <span class="genero"><?= $serie->getGenero() ?></span>
                    <h2><?= $serie->getTitulo() ?></h2>
                    <p class="ano">Lançamento: <?= $serie->getANO() ?></p>

                    <p><?= $serie->getDescricao() ?></p>

                    <?php if ($serie->ehClassico()): ?>
                        <span class="classico">Clássico</span>
                    <?php endif; ?>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="assuntos-estudados">
            <h2>Assuntos estudados</h2>
            <ul>
                <li>Classe-pai (superclasse): <b>Conteudo</b></li>
                <li>Classe-filha (subclasse): <b>Filme</b> e <b>Serie</b></li>
                <li>Herança utilizando <b>extends</b></li>
                <li>Herança com propriedades e métodos</li>
                <li>Visibilidade <b>protected</b> na superclasse permitindo o acesso atraves das subclasses .</li>
                <li>Construtor da superclasse através de <b>parent ::_ construct()</b></li>
                <li>Propriedades específicas das subclasses</li>
            </ul>
        </div>

    </div>
</body>

</html>