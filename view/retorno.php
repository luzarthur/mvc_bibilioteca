<?php
    session_start();
?>
<table width="100%">
    <tr>
        <td>ID</td>
        <td>Nome</td>
        <td>Autor</td>
        <td>Genero</td>
        <td>Status</td>
        
    </tr>
    <?php
        $retorno = $_SESSION["data"];
        var_dump($retorno);
        foreach($retorno as $value){
    ?>
    <tr>
        <td><?php echo $value[0];?></td>
        <td><?php echo $value[1];?></td>
        <td><?php echo $value[2];?></td>
        <td><?php echo $value[3];?></td>
        <td><?php echo $value[4];?></td>
    </tr>
    <?php } ?>
</table>