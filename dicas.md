# Dicas: `Pedido.php` e `StatusPedido.php`

Os dois arquivos trabalham juntos para representar um pedido e o estado atual
dele. `Pedido` guarda os dados do pedido; `StatusPedido` define quais status
são válidos.

## `StatusPedido.php`: opções válidas de status

```php
enum StatusPedido: string
{
    case Pendente = "Pendente";
    case AguardandoPagamento = "Aguardando pagamento";
    case Pago = "Pago";
    case EmPreparacao = "Em preparação";
    case SaiuParaEntrega = "Saiu para entrega";
}
```

- **`enum StatusPedido`** cria um tipo chamado `StatusPedido` com um conjunto
  limitado de alternativas. Em vez de representar o status com qualquer texto,
  o código pode usar somente os casos declarados aqui.
- **`: string`** indica que esta é uma enumeração associada a valores do tipo
  texto (uma *backed enum*). Cada caso tem um nome usado pelo código e um valor
  textual que pode ser exibido ou armazenado.
- **`case`** declara uma alternativa possível. Por exemplo,
  `StatusPedido::AguardandoPagamento` identifica o caso e seu `value` é
  `"Aguardando pagamento"`. O nome do caso não precisa ter espaços nem acentos;
  o valor pode ter a forma legível para a pessoa.
- **`->value`** acessa o texto associado ao caso. Por exemplo,
  `StatusPedido::Pago->value` resulta em `"Pago"`.

## `Pedido.php`: dados e comportamento de um pedido

### A classe e suas propriedades

- **`class Pedido`** define o molde usado para criar objetos de pedido.
- As propriedades **`$numero`**, **`$cliente`** e **`$status`** guardam,
  respectivamente, o número do pedido, o nome do cliente e seu status atual.
- **`private`** restringe o acesso direto às propriedades: o restante do código
  consulta ou altera esses dados pelos métodos da classe.
- Os tipos **`int`**, **`string`** e **`StatusPedido`** declaram que tipo de
  dado cada propriedade aceita. Em particular, `$status` precisa ser um caso
  válido da enumeração, não uma string livre.

### Construtor

O método **`__construct(int $numero, string $cliente, StatusPedido $status)`**
é chamado quando um pedido é criado. Ele recebe os três dados com seus tipos
esperados e os guarda no objeto usando `$this`, que se refere à instância atual.
Assim, um `Pedido` já nasce com número, cliente e status definidos.

### Getters e setters

- **`getNumero()`**, **`getCliente()`** e **`getStatus()`** devolvem os valores
  atuais das propriedades. O tipo indicado após `:` informa o tipo do valor
  retornado.
- **`setNumero()`**, **`setCliente()`** e **`setStatus()`** atualizam os valores.
  O tipo do parâmetro determina o que pode ser atribuído; por exemplo,
  `setStatus(StatusPedido $status)` também só aceita um caso de `StatusPedido`.
- **`: void`** nos setters indica que eles alteram o objeto e não devolvem um
  valor.

## Como os arquivos se relacionam

A propriedade `$status` e os métodos que recebem ou devolvem essa propriedade
usam `StatusPedido` como tipo. Essa ligação faz a enumeração funcionar como uma
lista central de status permitidos para todos os pedidos.

No `index.php`, os arquivos são incluídos antes do uso das classes. Depois,
pedidos são criados com expressões como:

```php
$pedido1 = new Pedido(1001, "Fulano", StatusPedido::Pendente);
```

O terceiro argumento precisa ser um caso da enumeração. Para alterar o status,
o exemplo usa:

```php
$pedido3->setStatus(StatusPedido::Pago);
```

Na exibição, `getStatus()` devolve o caso da enumeração, e
`$pedido->getStatus()->value` obtém o texto que aparece na página. O mesmo texto
é usado para montar a mensagem enviada pelo notificador.

## Um detalhe importante

A enumeração limita quais valores podem representar um status, mas, por si só,
não define regras de transição. Com o setter atual, por exemplo, qualquer caso
válido pode substituir qualquer outro; não há uma verificação de que um pedido
precise passar por etapas específicas antes de chegar a `Pago` ou
`SaiuParaEntrega`.
