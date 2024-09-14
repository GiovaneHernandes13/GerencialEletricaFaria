
@extends('layout.index')
@section('conteudo')
  
            <!-- Caixa de texto para pesquisar produtos -->
            <div class="search-container">
                <input class="pesquisa" type="text" id="searchProduct" placeholder="Pesquisar produtos...">
                
                    <a class="btn_add" href="{{route('produtos.create')}}">ADD Produto</a>
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
                            <a href="{{ route('produtos.show', ['produto'=> $produto->id_produto])}}">
                                <img class="icons" src="./img/documento.png" alt="">
                            </a>
                            <form action="{{ route('produtos.destroy', $produto->id_produto) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" >
                                    <img class="icons" src="./img/excluir.png" alt="Excluir">
                                </button>
                            </form>                            
                        </div>
                    </li>
                @endforeach
            </ul>
@endsection
