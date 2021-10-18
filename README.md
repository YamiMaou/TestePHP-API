# TESTE LARAVEL REST

## Objetivo
Desenvolver uma API rest para cadastro de produto e categoria, vinculando uma categoria a um produto.

## Requisitos

[x] DOCKER
[x] MYSQL 5.7
[x] PHP 7.4
[x] NODE 14.17.6

## ORIENTAÇÕES

Abra o seu terminal no diretório desejado para armazenar os arquivos da aplicação, logo em seguida execute o seguinte comando :

git clone -b dev https://github.com/YamiMaou/TestePHP-API.git .

Este comando irá clonar o branch dev do repositório da aplicação.

No diretório raíz do projeto execute os seguintes comandos no seu cmd/terminal para criarmos o arquivo .env de variáveis de ambiente do projeto :

```mv .env.example .env```

logo em seguida, vamos montar o container no docker e executar a aplicação com o comando a seguir:

``` docker-compose up --build -d ```

Feito isso caso não ocorra nenhum problema, o docker irá baixar e configurar as novas dependências de arquitetura para que o projeto fúncione.

Agora vamos criar as tabelas em nossa base de dados, primeio verifique se as imagens estão sendo executadas utilizando o seguinte comando :

docker ps

Procure pelo nome web ou [NOME_DO_DIRETORIO]_web na coluna NAMES. Após validar qual o nome do container, vamos executar o seguinte comando, para atualizar as dependencias e atualizar as migrations dentro do container:


```docker container exec **web** composer update``` 

e 

```docker container exec **web** php artisan migrate``` 

em seguida acesse  o endereço [http://localhost:8000](http://localhost:8000), lembre-se que as portas de uso para  a aplicação são : 3306 para o MySQL e 8000 para a aplicação web.

# Executando Testes com PHPUnit

No diretório principal da aplicação execute o seguinte comando :

``` php artisan test ``` .

O PHPUnit realizará um teste na rota **/api** para verificar se a mesma está online, em seguida irá realizar os testes de metodos.


# Agradecimentos

[Ephyllus Oliveira](mailto:ephyllus2@gmail.com)