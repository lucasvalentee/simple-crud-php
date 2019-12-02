<?php
header('Content-Type: text/html; charset=utf-8');
?>
<style>
    nav {
        width: 100%;
        background-color: #1f1f1f;
    }
    
    ul {
        width: 50%;
        background-color: #121212;
        margin: auto;
        height: 50px;
    }
    
    li {
        margin: auto;
    }
    
    nav, ul {
        display: flex;
        justify-content: space-between;
        flex-direction: row; 
    }
    
</style>
<nav>
    <ul class="nav nav-pills">
        <li class="<?= $bVerifica['cadastrar'] ? 'active' : '' ?>"><a class="active" href="inicio.php">Início</a></li>
        <li class="<?= $bVerifica['cadastrar'] ? 'active' : '' ?>"><a class="active" href="manutencao_cliente.php">Cadastrar Cliente</a></li>
        <li class="<?= $bVerifica['alterar']   ? 'active' : '' ?>"><a class="active" href="exibicao_cliente.php">Visualizar Cliente</a></li>
        <li class="<?= $bVerifica['excluir']   ? 'active' : '' ?>"><a class="active" href="manutencao_transportadora.php">Cadastrar Transportadora</a></li>
    </ul>
</nav>

