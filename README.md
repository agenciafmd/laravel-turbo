# F&MD - Laravel Turbo

![Banner](https://github.com/agenciafmd/laravel-turbo/raw/master/docs/banner.png "Banner")

[![Downloads](https://img.shields.io/packagist/dt/agenciafmd/laravel-turbo.svg?style=flat-square)](https://packagist.org/packages/agenciafmd/laravel-turbo)
[![Licença](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

Diminui o tempo de resposta e carregamento da página.

Veja mais em:

https://github.com/renatomarinho/laravel-page-speed
https://github.com/JosephSilber/page-cache

## Instalação

```
composer require agenciafmd/laravel-turbo:dev-master
```

## Configuração

Após instalado, você pode usar as seguintes opções

### Adicionando a middleware.

Para usarmos o nosso pacote, vamos adicionar a middleware `turbo`.
Com isso, a nossa rota, será minificada e um arquivo estático relativa a ela será criada em `public/page-cache`.

> É importante, que caso exista algum dado do banco nesta página, tenhamos o cuidado de limpar o cache assim que o dados for atualizado.
> [Ver mais](https://github.com/JosephSilber/page-cache)

```php
Route::get('/', function () {
    return view('welcome');
})->middleware('turbo');
```

> Não esqueça de configurar o apache / nginx para que o arquivo estático seja consumido.
> [Ver mais](https://github.com/JosephSilber/page-cache#url-rewriting)

### Para desabilitar.

No `.env`
```dotenv
TURBO_ENABLE=false
```

### Para customizar as middlewares de otimização. 

Publique o arquivo de configuração (`config/laravel-turbo.php`).

```shell
php artisan vendor:publish --tag="laravel-turbo:config"
```

Modifique as middlewares conforme a necessidade.
[Ver mais](https://github.com/renatomarinho/laravel-page-speed)

```php
...
'middlewares' => [
    CacheResponse::class,
    RemoveComments::class,
    RemoveQuotes::class,
    CollapseWhitespace::class,
]
...
```
