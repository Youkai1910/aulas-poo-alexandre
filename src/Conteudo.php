<?php
//src/Conteudo.php

abstract class Conteudo
{
    /* Visibilidade protected:
      Fica visível na própria superclasse (pai) em que foi declarada (Conteudo)
    e também para as subclasses (filha) */
    protected string $titulo;
    
    private string $genero;
    private int $ano;

public function __construct(string $titulo, string $genero, int $ano)
    {
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->setAno($ano);
    }
    
    // Declarando um método abstrato
    /* Criamos um "contrato", uma obrigatoriedade para as subclasses.
    Ou seja, elas serão OBRIGADAS a implementar este método.
    Obs: não colocamos chaves, pois aqui é apenas a declaração (ou
    assinatura) do método. */
    abstract public function getDescricao(): string;
      
    public function ehClassico(): bool
    {
      return $this->ano < 2000;
    }
   
    public function getTitulo(): string {
        return $this->titulo;
    }
    public function getGenero(): string {
             return $this->genero;
    }
    public function getANO(): int {
             return $this->ano;
    }

    public function setTitulo(string $titulo): void{
        $this->titulo = $titulo;
    }
    public function setGenero(string $genero): void{
        $this->genero = $genero;
    }
    public function setAno(int $ano): void {
            if($ano > 0){       
             $this->ano = $ano;}
    }
}