CRUD: 
C -> Criar produtos
R -> Ler produtos
U -> Atualizar produtos
D -> Deletar produtos

insert(), update(), select(), selectById(), delete()

---------------------------------------------------------------------------------------------------------------------

Sistema de inventário/gestão para dispositivos médicos:

Cliente - clientes da empresa (nome, endereço, telefone, email, senha)
Fornecedor - fornecedores de produtos (nome, contato, telefone, email, senha)
Produto - dispositivos médicos (nome, descrição, preço, validade, estoque + FKs)
Categoria - categorias de produtos (nome, descrição)
Marca - marcas dos produtos (nome, país de origem)
Login - autenticação de utilizadores

---------------------------------------------------------------------------------------------------------------------

Model --- representa uma entidade do negócio e aplica regras de validação

DAO   --- Trabalha com a base de dados 

Controller --- logica de negocio
    lista todos os registos
    cria/edita registo
    remove registo

View --- interface com Bootstrap

---------------------------------------------------------------------------------------------------------------------
ngrok  
    transforma o localhost:8000 numa URL pública temporária.
    servidor built-in PHP
        dentro da pasta \App\
            php -S localhost:8000

    executar ngrok (cmd)
        ngrok http 8000
        clicar no link 