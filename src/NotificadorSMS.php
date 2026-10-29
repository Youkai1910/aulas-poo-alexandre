<?php


class NotificadorSMS implements Notificador
{
private static int $quantidadeEnviada = 0;

public function enviar(string $mensagem): string
{
return "SMS: mensagem";
}
#[Override]
	public static function getQuantidadeEnviada(): int
    {
        return self::$quantidadeEnviada;
    }
}