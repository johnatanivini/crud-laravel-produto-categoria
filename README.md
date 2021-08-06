  # Crud Com Laravel 8 e Bootstrap

  ##Objetivo

  ##Tecnologias utilzadas:

  - Docker
  - PHP 8+
  - Laravel 8+
    - Pacotes Laravel Ui Bootstrap
  - Bootstrap 5
  - Swal para alertas
  - Banco de dados Mysql MariaDb

  #Requisitos negacionais
  
  1. CRUD de categorias de produto: Cadastrar categoria, alterar categoria, listar
    categorias e excluir categoria.
    
  2. CRUD de produtos: Cadastrar produto, alterar produto, listar produto e excluir
    produto.
    
#resultados

## Lista de Produtos
![image](https://user-images.githubusercontent.com/2191326/128569569-20956ff4-a196-4335-9ee3-a91f6d4baae1.png)
## Cadasstro de Produtos
![image](https://user-images.githubusercontent.com/2191326/128569649-21271c28-882e-451d-8b4a-c8a0a5a38740.png)
## Lista de Categorias
![image](https://user-images.githubusercontent.com/2191326/128569717-9c9b415e-7a86-4869-a8f8-4e9ed1d432de.png)
#cadastro de Categorias
![image](https://user-images.githubusercontent.com/2191326/128569773-4316471c-ace5-4a59-a0bc-c5a991c86afc.png)

#Foi utilizado o Docker como ambiente de desenvolimento local
- No docker composer estão serviços utilizados.

#Arquitetura
- Foi adicionada nas injeçoes de dependencia, as interfaces responsáveis pelo crud
- As validaçoes fora utilizadas FormRequests
- Foi efetuado um pequeno testes, com simulação de crud usando factories
- A Ui Interface foi utilizado Laravel ui bootstrap
- Com laravel mix para compilação dos arquivos SCSS, e JS 
- Foi Utilizado o Tema Flat do site bootstrapwatch
- Não foi implementado user
- Adicionados os Seeders para criação de dados fakes, com uso de factories do laravel
- O Standart do codigo foi auxiliado por meio do VS CODE com PHP_Codesniffer (PHPCS)
