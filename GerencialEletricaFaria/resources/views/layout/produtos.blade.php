<!DOCTYPE html>
<html lang="en">
<head>
    @include('../Exenciais.css')
    <link rel="stylesheet" href="./css/produto.css">
</head>
<body>

    <div class="layer"></div>
    <!-- ! Body -->
    <div class="page-flex">
        <!-- ! Sidebar -->
        @include('../Exenciais.sidebar')
        
        <div class="container_produtos">
            <h1>Produtos</h1>
            
            <!-- Caixa de texto para pesquisar produtos -->
            <div class="search-container">
                <input type="text" id="searchProduct" placeholder="Pesquisar produtos...">
            </div>
        
            <!-- Títulos das colunas -->
        
            <ul id="productList">
                <div class="titulos">
                    <div class="id_produto">Code</div>
                    <div class="nome_produto">Nome</div>
                    <div class="descricao_produto">Descrição</div>
                    <div class="preco_produto">Preço</div>
                </div>
                @foreach ($produtos as $produto)
                    
                    <li class="list_prod">
                        <div class="id_produto">{{ $produto->id_produto }}</div>
                        <div class="nome_produto">{{ $produto->nome_produto }}</div>
                        <div class="descricao_produto">{{ $produto->descricao }}</div>
                        <div class="preco_produto">{{ $produto->preco }}</div>

                        <div class="icons-container">
                            <!-- Caixa de seleção para escolher a ação -->
                            <a href="{{ route('produtos.edit', ['produto' => $produto->id_produto])}}">
                                <img class="icons" src="img/edit.png" alt="Editar">
                            </a>                            
                            <a href="#"><img class="icons" src="img/excluir.png" alt="Excluir"></a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>        
    </div>

    <!-- Chart library -->
    <script src="./plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="js/script.js"></script>
</body>
</html>
