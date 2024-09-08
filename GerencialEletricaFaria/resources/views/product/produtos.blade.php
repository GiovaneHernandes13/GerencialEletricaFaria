
@extends('layout.index')
@section('conteudo')
  
            <!-- Caixa de texto para pesquisar produtos -->
            <div class="search-container">
                <input class="pesquisa" type="text" id="searchProduct" placeholder="Pesquisar produtos...">
                <button class="btn_add">ADD Produto
                <a href="">
                    
                </a>
                </button>
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
@endsection
