<?php

class Filme
{

    private string $titulo;
    private string $genero;
    private int $ano;
   
    public function ehClassico()
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
