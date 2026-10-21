<?php
//src/Serie
// Serie é uma subclasse que HERDA da superclasse Conteudo
class Serie extends Conteudo {
 /*Mini-exercícios */
// 1) Adicione uma propriedade específica da Série: temporadas
// 2) Programe o uso dos construtores considerando superclasse e subclasse
// 3) Faça getter/setter para esta propriedade
// 4) (na index.php) Crie dois objetos do tipo Serie
// 5) (na index.php) Mostre estes dois objetos usando var_dump

private int $temporadas;

public function __construct(string $titulo, string $genero, int $ano, int $temporadas)
{
    parent::__construct($titulo, $genero, $ano);

    $this->temporadas = $temporadas;
}
public function getTemporadas():int {
    return $this->temporadas;
}
public function setTemporadas(int $temporadas): void {
     $this->temporadas = $temporadas;
}
}