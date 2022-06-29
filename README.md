# docker_app_carros

Uma aplicação de concessionaria que possue 3 containers 
mysql-container
node-container
php-container

Comandos

-t => tag (dar nome a image)
-f => especifica o Dockerfile para gerar a image
. no final => contexto da pasta para gerar a image vai a da pasta atual
	ou seja, como se a image fosse contruida no diretorio atual

-d => que vai executar em background, não vai travar o terminal
--rm => se o container já existir, vai remover e criar um novo
--name => nome do container

-i => comando no modo interativo (shell) não finaliza o processo até terminar
-it => vai usar o tty (terminal)

-v => informa qual pasta irá compartilhar com o container host : container

-p => diz que a porta esta exposta mapeia que a porta 9001 do host vai acessar a porta 9001 do container

# Criar a image:

docker build -t mysql-image -f api/db/Dockerfile .


# Listar images:

docker image ls


# Criar o container a partir da image passada:

docker run -d --rm --name mysql-container mysql-image


# Container que estão de pé:

docker ps


# executar comando dentro de um container que esta rodando:

docker exec

docker exec -i mysql-container mysql -uroot -padmin < api/db/script.sql


-acesso ao terminal do container

docker exec -it mysql-container mysql -uroot -admin /bin/bash

-acesso ao mysql 

mysql -uroot -padmin

use concessionaria;
select * from carros;
INSERT INTO carros VALUE(0, 'CCC1234', 'Mercedes', 'C180', 2016, 90000);


# Parar o container
docker stop mysql-container

show databases;



# atraves do volume é possivel compartilhas uma parte do host com o container

parar o container

docker run -d -v C:\workspace\docker_app_carros\api\db\data:/var/lib/mysql --rm --name mysql-container mysql-image

node 10


WORKDIR pasta que irá executar o cmd


docker build -t node-image -f api/Dockerfile .

docker run -d -v   -p 9001:9001 --rm --name node-container node-image

docker stop node-container

docker run -d -v C:\workspace\docker_app_carros\api:/home/node/app -p 9001:9001 --link mysql-container --rm --name node-container node-image

docker build -t php-image -f website/Dockerfile .


 


