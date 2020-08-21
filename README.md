API Nossa Biblioteca

Todos os livros disponíveis na Nossa Biblioteca.

Instalação
Antes de iniciar a instalação, é necessário instalar os seguintes itens:
- PHP 7.4 com as seguintes extensões:
    -OpenSSL PHP Extension
    -PDO PHP Extension
    -Mbstring PHP Extension
    -Mbstring PHP Extension
    -pdo_pgsql PHP Extension
    -pgsql PHP Extension
- Docker
- Composer

Instruções de instalação:
1- Clone o projeto para um repositório local

```git clone https://github.com/FelixBea/nossa-biblioteca-api.git```

2- Na pasta do projeto, instale as dependencias com o Composer. Certifique-se de
  que ele está no seu PATH para que o comando seja reconhecido.

```composer install```

3- Inicie o container do banco de dados via comando docker

```docker-compose up -d```

4- Crie um arquivo .env no diretório raiz do projeto copiando o conteudo do arquivo .env.example.
   Substitua as seguintes variáveis no .env e salve:
   ```DB_CONNECTION=pgsql
   DB_HOST=localhost
   DB_PORT=5432
   DB_DATABASE=postgres
   DB_USERNAME=postgres```

5- Execute as migrations para criar as tabelas do projeto

```php artisan migrate```

6- Caso necessário, faça os inserts iniciais no banco de dados utilizando um
   client de PostgreSQL (pgAdmin) com as seguintes configurações. Os inserts
   estão na pasta do projeto em database/data.sql.
   - Host: localhost
   - Porta: 5432
   - User: postgres
   - Senha: secret

   Alternativa para fazer inserts sem um client:
   Também é possível utilizar o terminal acessando diretamente o container do
   banco de dados com o comando
   ```docker exec -ti nossa-biblioteca-api_db_1 sh```

   Em seguida, acesse a ferramenta de queries:
   ``` psql -U postgres ```

   Insira todos os inserts necessários e certifique-se que todas as queries
   terminam em ";". Após terminar, insira ```\q``` para sair do psql e ```exit```
   para sair do container.

7- Inicie a aplicação, que estará disponível no localhost na porta 8000:

  ``` php -S localhost:8000 -t public```
