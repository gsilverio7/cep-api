
# CEP API

API que consulta vários CEPs simultaneamente usando viaCEP.

## Stack utilizada

PHP, Laravel, PHPUnit, Swagger



## Rodando o projeto localmente

Requisitos: PHP 8.2 

Clone o projeto

```bash
  git clone https://github.com/gsilverio7/cep-api.git
```

Instale as dependências

```bash
  composer install
```

Inicie o servidor

```bash
  php artisan serve
```


## Rodando os testes

Para rodar os testes, rode o seguinte comando

```bash
  php artisan test
```


## Documentação da API

#### Buscar CEPs

```http
  GET /api/search/local/{ceps}
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `ceps` | `string` | **Obrigatório**. CEPs separados por vírgula |

A documentação também está disponível de forma interativa na página inicial do projeto. 


## Screenshots

![App Screenshot](https://via.placeholder.com/468x300?text=App+Screenshot+Here)

