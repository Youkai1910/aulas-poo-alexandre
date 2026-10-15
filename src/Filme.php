<?php
// src/Filme.php

class Filme
{

    public string $titulo;
    public string $genero;
    public int $ano;
    public string $direcao;

    
    public function ehClassico()
    {
      
      return $this->ano < 2000;
    }
}