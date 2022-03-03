<?php
class usuariosDAO
{
    public function verifLogin(usuariosVO $value)
    {
        $db = new DB();
        $email = $value->getEmail();
        $senha = $value->getSenha();
        
        $sql = "SELECT COUNT(*) FROM usuarios where email = :email;";
        $db->getConnection();
        $pstm = $db->execSql($sql);
        $pstm->bindParam(':email', $email);
        $pstm->execute();

        if ($pstm->fetchColumn() == 0) { 
            ?>
            <script>alert('Email inserido não corresponde a um usuario cadastrado! Altere o email ou crie sua conta! ')</script>
            <?php
        } else {
            $sql = "SELECT COUNT(*) FROM usuarios WHERE email = :email and senha = :senha;";
            $otherpstm = $db->execSql($sql);
            $otherpstm->bindParam(':email', $email);
            $otherpstm->bindParam(':senha', $senha);
            $otherpstm->execute();

            if($otherpstm->fetchColumn() == 0){
            ?>
                <script>alert('Senha incorreta!')</script>
            <?php
            }else{
            ?>
                <script>alert('Login Realizado!')</script>
            <?php
            }
        }
       
    }
    public function criarUsuario(usuariosVO $value)
    {
        $db = new DB();
        $email = $value->getEmail();
        $nome = $value->getNome();
        $senha = $value->getSenha();

        $db->getConnection();
        $sql = "INSERT INTO usuarios(email,nome,senha) VALUES ('$email','$nome', '$senha');";
       
        $pstm = $db->execSql($sql);
        $pstm->execute();
    }
}
