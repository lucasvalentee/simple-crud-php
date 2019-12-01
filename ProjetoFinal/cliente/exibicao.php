<?php
    include_once '../conexao.php';
    try {
        $oQuery = $conn->prepare('SELECT * FROM clientes');
//      $oQuery->bindParam(':id', $id, PDO::PARAM_INT);
        $oQuery->execute();

        $aResultado = $oQuery->fetchAll();
        
?>
    <table border="1" class="table table-striped">
        <tr>
            <th>ID Cliente</th>
            <th>Nome da Companhia</th>
            <th>Nome do Contato</th>
            <th>Título do Contato</th>
            <th>Endereço</th>
            <th>Cidade</th>
            <th>Região</th>
            <th>CEP</th>
            <th>País</th>
            <th>Telefone</th>
            <th>FAX</th>
        </tr>
<?php
        if($aResultado) {
            foreach($aResultado as $oResultado) {
                ?>
                <tr>
                    <td><?=$oResultado['IDCliente']?></td>
                    <td><?=$oResultado['NomeCompanhia']?></td>
                    <td><?=$oResultado['NomeContato']?></td>
                    <td><?=$oResultado['TituloContato']?></td>
                    <td><?=$oResultado['Endereco']?></td>
                    <td><?=$oResultado['Cidade']?></td>
                    <td><?=$oResultado['Regiao']?></td>
                    <td><?=$oResultado['CEP']?></td>
                    <td><?=$oResultado['Pais']?></td>
                    <td><?=$oResultado['Telefone']?></td>
                    <td><?=$oResultado['Fax']?></td>
                    <td>
                        <a href="?modulo=cidades&pagina=alterar&id=<?=$oResultado['id']?>">Alterar</a>
                        <a href="?modulo=cidades&pagina=deletar&id=<?=$oResultado['id']?>">Excluír</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "Nenhum resultado retornado.";
        }
?>
</table>
<?php
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }