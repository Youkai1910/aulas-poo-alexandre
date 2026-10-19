<?php

class Filme
{
// estes são propriedades
    private string $titulo;
    private string $genero;
    private int $ano;
   
    /* Método Construtor: a finalidade deste método é receber dados (atráves de parâmetros) 
    no momento da criação do objeto atribuí-los às propriedades. Este método NÃO POSSUI retorno.*/
    public function __construct(string $titulo, string $genero, int $ano)
    {
        // Atribuindo os valores recebidos pelos parâmetros às propriedades
        $this->titulo = $titulo;
        $this->genero = $genero;
        $this->ano = $ano;
    }

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
