# TESTE UMENTOR
Projeto de teste Umentor para exibição de uma tabela de registro e cadastro de usuarios

## REQUISITOS
- Composer 2.7.7
- PHP 8.1.10
- MySQL 5.2.1

# INSTALAÇÃO
Clone o repositório do projeto com o comando abaixo:
```sh
 git clone https://github.com/rafaellopes21/teste_umentor.git
```

## CONFIGURAÇÃO
Crie a base de dados no MySQL chamada *teste_umentor* e importe o arquivo [teste_umentor.sql](teste_umentor.sql) que
está localizado na RAIZ DO PROJETO.

- OBSERVAÇÃO: Caso o nome da base seja alterado ou tenha qualquer registro diferente, será necessário
acessar o arquivo *app/app.php* e alterar as credênciais de acesso do banco de dados na sessão 'addConnection', pois o
padrão definido está como exibido abaixo:
```
 $capsule->addConnection([
      'driver' => 'mysql',
      'host' => 'localhost',
      'database' => 'teste_umentor',
      'username' => 'root',
      'password' => '',
      'charset' => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix' => '',
  ]);
```

## INICIAR O SERVIDOR
Basta executar o comando abaixo e o próprio sistema se encarregará de verificar todas as dependencias
necessárias e em seguida executará o projeto automaticamente:
```sh
 composer start
```