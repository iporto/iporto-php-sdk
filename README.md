# iPORTO / SDK

## Instalação (recomendado):

Composer ajuda no gerenciamento de dependências em projetos PHP. Veja mais detalhes sobre, aqui: <http://getcomposer.org>

Adicione este pacote (`iporto/iporto-php-sdk`) ao seu `composer.json`, ou apenas execute a linha de comando abaixo:

```
$ ./composer.phar require iporto/iporto-php-sdk:dev-main
```

## Uso

### Inicialização

Este pacote segue os padrões [PSR-0](http://www.php-fig.org/psr/psr-0/) para include de arquivos e classes.

Uma vez que os arquivos da SDK seja carregados, você precisa inicializar um objeto `iPORTO`, como exemplo, para envio de e-mail `iPORTO\Mail\MailClient`. Ao iniciar uma instância, é preciso informar seu _Token de Autenticação_.

```php
$objMail = new iPORTO\Mail\MailClient([
  'auth_bearer' => "{token}",
]);
```
