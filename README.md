<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://bpprodstorage.blob.core.windows.net/bpblobcontainer/4010257/images/2f0853f7-9fc7-45bb-8fd7-967a9cb70815S6GD3hTIRNqyfRhYsjzKhA5J5aRX4xojn531xwBLC34m0lBnjg_YLO7YMdzmzyOiDc0XaAw9SrtmJFYelw=s0.Png" width="400"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sobre o projeto

Projeto foi criado com o intuito de demonstrar aos 
recrutadores da empresa WebMais parte do meu potencial e valor como possivel contratado.

## Instalação

 - Navegue até o diretório do projeto Laravel clonado.
 - Execute o comando composer install para instalar todas as dependências do projeto. Você poderá baixar clicando aqui: **[Composer](https://getcomposer.org/Composer-Setup.exe)**.
 
 - No diretório do projeto, localize o arquivo .env.example.
 - Faça uma cópia deste arquivo e renomeie-o para .env.
 - Abra o arquivo .env em um editor de texto.
 - Configure as informações do banco de dados MySQL:
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=nome_do_banco_de_dados
     DB_USERNAME=nome_de_usuário_do_mysql
     DB_PASSWORD=senha_do_usuário_do_mysql
 - No terminal, execute o comando php artisan key:generate para gerar a chave de aplicativo Laravel.
 - No terminal, execute o comando php artisan migrate para executar as migrações do banco de dados e criar as tabelas necessárias.
 - No terminal, execute o comando php artisan db:seed para executar as seeders e adicionar registro as tabelas.
 - Execute o comando php artisan serve para iniciar o servidor de desenvolvimento do Laravel.
 - Abra um navegador da web e navegue para o endereço http://localhost:8000 (ou o endereço fornecido pelo comando php artisan serve) para acessar o projeto Laravel.

IMPORTANTE: NECESSÁRIO PHP E MYSQL PARA RODAR O PROJETO

## O PROJETO

Assim como solicitado na requisição do projeto, foi criado um sistema de cadastro de produtos, onde deveria ser possivel o usuario escolher qual identificador do registro no momento do cadastro, cadastrar os detalhes do produto como largura, atlura e profundidade, o ponto chave seria a possibilidade de inserir varios comentarios para o produto. 

Foram criadas 4 telas, a tela de login, cadastro de produto, edicao de produto, e listagem de produto.

**Login:**
- A tela de login possui uma regra de autenticação onde somente usuários cadastrados no banco de dados conseguem fazer login e se autenticar no sistema.
- O usuário poderá fazer login usando o email (webmais@gmail.com) e a senha (senha123).

**Cadastro de Produto:**
- A tela de cadastro de produto não permite que dois produtos no banco de dados tenham o mesmo nome ou o mesmo ID, para não haver registros repetidos, evitando armazenamento inútil.
- A tela de cadastro permite a inserção de comentários. Esses comentários são apresentados em uma tabela abaixo à medida que são inseridos, para visualização do cliente.
  
**Listagem de Produtos:**
- A tela de listagem de produtos a princípio é bem simples, mostrando as informações do produto, como valor, altura, largura, profundidade, nome e código. Também possui dois botões, um para edição e outro para exclusão.
- O botão de exclusão realiza apenas um softDelete, adicionando uma data de deleção ao registro, fazendo com que o mesmo não apareça em consultas futuras, mas ainda exista no banco para históricos futuros, como notas fiscais e afins.
- O botão de edição redireciona para uma tela de edição, onde serão realizadas as edições do produto.

**Edição de Produto:**
- Esta tela é basicamente a mesma que a de cadastro de produto. No entanto, nela não é permitido alterar o IDENTIFICADOR do produto, pois isso pode causar alguma inconsistência no banco de dados.
- Comentários adicionados nessa tela seguirão a mesma função da tela de criação.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
