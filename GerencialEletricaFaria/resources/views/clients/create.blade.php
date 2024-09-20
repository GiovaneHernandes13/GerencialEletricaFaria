@extends('layout.index')

@section('conteudo')
<h1>Cadastrar Cliente</h1>
<form action="{{ route('pessoas.store') }}" method="POST">
    @csrf

    <label for="tipo">Tipo:</label>
    <div class="input-group">
        <select id="tipo" name="tipo" required>
            <option value="F">Pessoa Física</option>
            <option value="J">Pessoa Jurídica</option>
        </select>
    </div>

    <div id="cpf-group" class="input-group">
        <label for="cpf">CPF:</label>
        <div class="input-icon">
            <i class="fas fa-id-card"></i>
            <input type="text" id="cpf" name="cpf" placeholder="Digite o CPF">
        </div>
    </div>

    <div id="cnpj-group" class="input-group" style="display:none;">
        <label for="cnpj">CNPJ:</label>
        <div class="input-icon">
            <i class="fas fa-building"></i>
            <input type="text" id="cnpj" name="cnpj" placeholder="Digite o CNPJ">
        </div>
    </div>

    <div class="input-group">
        <label for="nome">Nome:</label>
        <div class="input-icon">
            <i class="fas fa-user"></i>
            <input type="text" id="nome" name="nome" required placeholder="Digite o nome">
        </div>
    </div>

    <div class="input-group">
        <label for="email">Email:</label>
        <div class="input-icon">
            <i class="fas fa-envelope"></i>
            <input type="email" id="email" name="email" required placeholder="Digite o email">
        </div>
    </div>

    <div class="input-group">
        <label for="telefone">Telefone:</label>
        <div class="input-icon">
            <i class="fas fa-phone"></i>
            <input type="text" id="telefone" name="telefone" required placeholder="Digite o telefone">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<script>
    document.getElementById('tipo').addEventListener('change', function() {
        var tipo = this.value;
        document.getElementById('cpf-group').style.display = tipo === 'F' ? 'block' : 'none';
        document.getElementById('cnpj-group').style.display = tipo === 'J' ? 'block' : 'none';
    });
</script>

<style>
    .input-group {
        margin-bottom: 15px;
    }
    .input-icon {
        position: relative;
    }
    .input-icon i {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #888;
    }
    .input-icon input {
        padding-left: 30px;
        width: 100%;
    }
</style>
@endsection
