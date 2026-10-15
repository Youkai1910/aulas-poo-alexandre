<?php
// src/Filme.php

class Filme
{
    // Propriedades: características
    public string $titulo;
    public string $genero;
    public int $ano;
    public string $direcao;

    //Métodos: comportamentos (funções)
    public function ehClassico()
    {
      // É clássico SE ano for menor que 2000
      return $this->ano < 2000;
    }
}