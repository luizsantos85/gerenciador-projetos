## Projeto desenvolvido no curso de Laravel Eloquent

Desenvolvido no curso de Laravel Eloquent

### Instalando o projeto

#### Clonar o repositório

```
git clone https://github.com/luizsantos85/gerenciador-projetos.git
```

## Configurações / Requisitos

-   **[nginx:alpine]**
-   **[mysql:8.0](https://www.mysql.com/)**
-   **[redis]**
-   **[Laravel:11](https://laravel.com/)**
-   **[PHP:8.2\*](https://www.php.net/manual/pt_BR/index.php)**
-   **[docker]**

## Instalar App Usando docker

```bash
$ git clone https://github.com/luizsantos85/capacitacao-tms.git

**observar as configurações de portas e usuario no arquivo docker-composer.yml

**Copiar o .env.example e gerar o .env, fazer as modificações das portas (se necessário) e usuario do DB

**Inicializar os containers
$ docker compose up -d

**será criada uma pasta .docker/mysql para os arquivos de banco de dados

**Acessar o container do laravel
$ docker compose exec app bash

**Instalar os packges do laravel
$ composer install

**Gerar a key do laravel
$ php artisan key:generate

**Gerar as migrations do banco
$ php artisan migrate

**acessar localhost:8000 para acessar o sistema
**Acessar phpmyadmin localhost:8080 (user: mesmo definido no env, senha: mesma definida no env)
```

#### Instalar as depencências

```
composer install
```

Ou em ambiente de desenvolvimento:

```
composer update
```

#### Criar arquivo de configurações de ambiente

Copiar o arquivo de exemplo `.env.example` para `.env` na raiz do projeto
configurar os detalhes da aplicação e conexão com o banco de dados.

#### Criar a estrutura no banco de dados

```
php artisan migrate
```

#### Iniciar o servidor de desenvolvimento

```
php artisan serve
```
