<?php

/* A Interface define os métodos que cada classe DEVE implementar
obrigatoriamente. Podemos dizer que Interface é como um Contrato, em
que as assinaturas (métodos) deverão ser honradas. 

Usamos a Interface para garantir que todas as classes que a utilizem,
sigam um mesmo padrão definido nos métodos. Ainda assim, cada classe poderá
ter uma implementação diferente no corpo do método (polimorfismo). */
interface Notificador
{
    /* O padrão definido aqui é: nome, parâmetros, tipo de dados
    dos parâmetro e tipo de retorno do método */
    public function enviar(string $mensagem): string;

    public static function getQuantidadeEnviada(): int;
}
