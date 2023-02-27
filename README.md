rdstation-sdk-php-laravel
=========================

rdstation-sdk-php-laravel foi criado e é mantido pela equipe [Jetimob](https://github.com/jetimob). É um SDK utilizado para
interagir com a API da [RDStation](https://developers.rdstation.com/reference) de forma simples e direta. A complexidade de autenticação
[OAuth2](https://oauth.net/2/) é abstraída pelo pacote [http-php-laravel](https://github.com/jetimob/http-php-laravel/),
também desenvolvido dentro da Jetimob.

<a href="https://www.conventionalcommits.org/en/v1.0.0-beta.4"><img src="https://img.shields.io/badge/conventional%20commits-1.0.0beta.4-brightgreen.svg?style=flat-square&logo=git" alt="Regras de commit"></a>
<a href="https://packagist.org/packages/jetimob/rdstation-sdk-php-laravel"><img src="https://img.shields.io/packagist/dt/jetimob/rdstation-sdk-php-laravel?logo=packagist&logoColor=white&style=flat-square" alt="Downloads no Packagist"></a>
<a href="LICENSE"><img src="https://img.shields.io/badge/license-MIT-brightgreen?style=flat-square" alt="Licença"></a>
<a href="https://github.com/jetimob/rdstation-sdk-php-laravel/releases"><img src="https://img.shields.io/github/release/jetimob/rdstation-sdk-php-laravel?style=flat-square&color=brightgreen" alt="Última versão do pacote"></a>

## Instalação

Utilizando o composer:

```shell
composer require jetimob/rdstation-sdk-php-laravel
```

## Configuração

Publique as configurações do pacote:

````shell
php artisan rdstation:install
````

Este comando irá criar o arquivo de configuração `rdstation.php` no diretório `config`. Substitua os valores de `oauth_client_id`, `oauth_client_secret` e `oauth_authorization_uri` com os valores do seu aplicativo criado na RDStation AppStore.

## Uso

Sempre que for chamar qualquer api do pacote *rdstation-sdk-php-laravel*, utilize o namespace `Jetimob\RDStation\Facades\Juno`
ou, simplesmente, `RDStation`. O namespace `RDStation` é registrado automaticamente pelo **Laravel**, ou seja, a importação pode
ser feita apenas com `use RDStation;` no topo de um arquivo.

Qualquer uma das implementações de *API* encontradas na configuração `api_impl` podem ser acessadas diretamente através
da façade `RDStation`, invocando um método de mesmo nome da chave de configuração. Em outras palavras, a chave `webhook`, que
representa a classe `\Jetimob\RDStation\Api\Webhook\WebhookApi::class`, dentro do vetor `api_impl` do arquivo de
configurações pode ser invocada com `\RDStation::webhook()`. O retorno desta função é uma instância de
`\Jetimob\RDStation\Api\Webhook\WebhookApi::class` (definido pelo arquivo de configuração).

## Testes

1. Para os testes funcionarem, você deve possuir um aplicativo criado na RDStation AppStore. Se você ainda não tiver um aplicativo criado, você pode criar um aplicativo em https://appstore.rdstation.com/.
> A URL de callback pode ser `https://localhost`, o importante é obtermos o `code` para realizar os testes.
2. Insira o `RDSTATION_OAUTH_CLIENT_ID` e `RDSTATION_OAUTH_CLIENT_SECRET` do seu aplicativo no arquivo `.phpunit.xml` e troque `RDSTATION_OAUTH_AUTHORIZATION_URI` para: `https://api.rd.services/auth/dialog?client_id=<CLIENT_ID>&#038;redirect_uri=<REDIRECT_URI>&#038;state=state`, trocando <CLIENT_ID> e <REDIRECT_URI> pelos valores correspondentes.
3. Execute qualquer teste que precise de autenticação com o comando `phpunit --filter <nome_do_teste>`.
4. Uma exceção será lançada, com o link para você realizar a autenticação. Copie o link e cole no seu navegador.
5. Você será redirecionado para a página de autenticação da RDStation. Faça o login e você será redirecionado para a URL de callback que você definiu no passo 1.
6. Copie o valor do parâmetro `code` da URL de callback.

---

###### Se o `artisan` estiver disponivel

7. Execute o comando `php artisan rdstation:code <CODE> --test` (a flag `--test` é importante para que o token seja salvo em um arquivo temporário acessado pelos testes).

###### Se o `artisan` **NÃO** estiver disponivel

7. Insira o valor de `code` no arquivo `tests\Feature\AuthzTest` como parâmetro do método `handleAuthorizationCodeExchange` e execute o teste.

---

8. Agora você pode executar os testes que precisam de autenticação.

## Licença

rdstation-sdk-php-laravel está licenciado sob [The MIT License (MIT)](LICENSE).
