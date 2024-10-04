@extends('layout.index')

@section('conteudo')
<h1>Cadastrar Cliente</h1>
<form action="{{ route('pessoas.store') }}" method="POST">
    @csrf

    <label for="tipo">Tipo:</label>
    <div class="input-group">
        <select id="tipo" name="tipo" required onchange="toggleFields()">
            <option value="1">Pessoa Física</option>
            <option value="2">Pessoa Jurídica</option>
        </select>
    </div>

    <!-- Campos para Pessoa Física -->
    <div id="cpf-group" class="input-group">
        <label for="cpf">CPF:</label>
        <div class="input-icon">
            <i class="fas fa-id-card"></i>
            <input type="text" id="cpf" name="cpf" required placeholder="Digite o CPF">
        </div>
    </div>

    <div id="rg-group" class="input-group">
        <label for="rg">RG:</label>
        <div class="input-icon">
            <i class="fas fa-id-card"></i>
            <input type="text" id="rg" name="rg" required placeholder="Digite o RG">
        </div>
    </div>

    <div id="data-nascimento-group" class="input-group">
        <label for="data_nascimento">Data de Nascimento:</label>
        <div class="input-icon">
            <i class="fas fa-calendar"></i>
            <input type="date" id="data_nascimento" name="data_nascimento" required>
        </div>
    </div>

    <div id="apelido-group" class="input-group">
        <label for="apelido">Apelido:</label>
        <div class="input-icon">
            <i class="fas fa-user"></i>
            <input type="text" id="apelido" name="apelido" placeholder="Digite o apelido">
        </div>
    </div>

    <!-- Campos para Pessoa Jurídica -->
    <div id="cnpj-group" class="input-group" style="display:none;">
        <label for="cnpj">CNPJ:</label>
        <div class="input-icon">
            <i class="fas fa-building"></i>
            <input type="text" id="cnpj" name="cnpj" placeholder="Digite o CNPJ">
        </div>
    </div>

    <div id="inscricao-estadual-group" class="input-group" style="display:none;">
        <label for="inscricao_estadual">Inscrição Estadual:</label>
        <div class="input-icon">
            <i class="fas fa-file-alt"></i>
            <input type="text" id="inscricao_estadual" name="inscricao_estadual" placeholder="Digite a Inscrição Estadual">
        </div>
    </div>

    <div id="razao-social-group" class="input-group" style="display:none;">
        <label for="razao_social">Razão Social:</label>
        <div class="input-icon">
            <i class="fas fa-building"></i>
            <input type="text" id="razao_social" name="razao_social" placeholder="Digite a Razão Social">
        </div>
    </div>
    <div id="nome-group" class="input-group">
        <label for="nome">Nome:</label>
        <div class="input-icon">
            <i class="fas fa-user"></i>
            <input type="text" id="nome" name="nome" required placeholder="Digite o nome">
        </div>
    </div>

    <div id="fantasia-group" class="input-group" style="display:none;">
        <label for="fantasia">Nome Fantasia:</label>
        <div class="input-icon">
            <i class="fas fa-building"></i>
            <input type="text" id="fantasia" name="fantasia" placeholder="Digite o Nome Fantasia">
        </div>
    </div>

    <div id="data-fundacao-group" class="input-group" style="display:none;">
        <label for="data_fundacao">Data de Fundação:</label>
        <div class="input-icon">
            <i class="fas fa-calendar"></i>
            <input type="date" id="data_fundacao" name="data_fundacao">
        </div>
    </div>

    <!-- Campos comuns -->
    <label for="email">Email:</label>
    <div class="input-icon">
        <i class="fas fa-envelope"></i>
        <input type="email" id="email" name="email" required placeholder="Digite o email">
    </div>
    @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif
    

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
function toggleFields() {
    var tipo = document.getElementById("tipo").value;

    // Pessoa Física
    var cpfGroup = document.getElementById("cpf-group");
    var rgGroup = document.getElementById("rg-group");
    var apelidoGroup = document.getElementById("apelido-group");
    var dataNascimentoGroup = document.getElementById("data-nascimento-group");

    // Pessoa Jurídica
    var cnpjGroup = document.getElementById("cnpj-group");
    var inscricaoEstadualGroup = document.getElementById("inscricao-estadual-group");
    var razaoSocialGroup = document.getElementById("razao-social-group");
    var fantasiaGroup = document.getElementById("fantasia-group");
    var dataFundacaoGroup = document.getElementById("data-fundacao-group");

    if (tipo == "1") {
        // Mostrar campos de Pessoa Física
        cpfGroup.style.display = "block";
        rgGroup.style.display = "block";
        apelidoGroup.style.display = "block";
        dataNascimentoGroup.style.display = "block";

        // Esconder campos de Pessoa Jurídica
        cnpjGroup.style.display = "none";
        inscricaoEstadualGroup.style.display = "none";
        razaoSocialGroup.style.display = "none";
        fantasiaGroup.style.display = "none";
        dataFundacaoGroup.style.display = "none";
    } else if (tipo == "2") {
        // Mostrar campos de Pessoa Jurídica
        cnpjGroup.style.display = "block";
        inscricaoEstadualGroup.style.display = "block";
        razaoSocialGroup.style.display = "block";
        fantasiaGroup.style.display = "block";
        dataFundacaoGroup.style.display = "block";

        // Esconder campos de Pessoa Física
        cpfGroup.style.display = "none";
        rgGroup.style.display = "none";
        apelidoGroup.style.display = "none";
        dataNascimentoGroup.style.display = "none";
    }
}
</script>

@stop