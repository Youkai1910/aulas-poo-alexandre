<?php

namespace App\Notificacoes; 

class NotificadorEmail implements Notificador
{
  // Contador de envios
  private static int $quantidadeEnviada = 0;
  /* Implementação do método enviar de acordo com os padrões
  definidos na Interface: mesmo nome, mesma quantidade de parâmetros,
  nesmo tipo de dados dos parâmetros, mesmo tipo de retorno esperado. */
  public function enviar(string $mensagem): string
  {
    /* Sempre que ocorrer o acionamento do método enviar,
    atualizaremos a propriedade estática da classe */
    self::$quantidadeEnviada++;
    /* Corpo do método: detalhes da implementação PODEM ser
    do jeito que quisermos */
    return "E-mail: $mensagem";
  }
  /* Usaremos um getter estático para ter
  acesso ao total de envios feitos */
  public static function getQuantidadeEnviada(): int
  {
      return self::$quantidadeEnviada;
  }
}