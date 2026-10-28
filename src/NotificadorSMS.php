<?php


class NotificadorSMS implements Notificador
{

public function enviar(string $mensagem): string
{
return "SMS: 1mensagem";
}
}