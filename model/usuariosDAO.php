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
            $value->setStatus("erro de email");
        } else {
            $sql = "SELECT COUNT(*) FROM usuarios WHERE email = :email and senha = :senha;";
            $otherpstm = $db->execSql($sql);
            $otherpstm->bindParam(':email', $email);
            $otherpstm->bindParam(':senha', $senha);
            $otherpstm->execute();

            if($otherpstm->fetchColumn() == 0){
                $value->setStatus("erro de senha");
            }else{
                $value->setStatus("login ok");
            }
        }
       
    }
    public function criarUsuario(usuariosVO $value)
    {
        $db = new DB();
        $email = $value->getEmail();
        $nome = $value->getNome();
        $senha = $value->getSenha();

        $sql = "SELECT COUNT(*) FROM usuarios where email = :email;";
        $db->getConnection();
        $pstm = $db->execSql($sql);
        $pstm->bindParam(':email', $email);
        $pstm->execute();

        if ($pstm->fetchColumn() == 1) { 
            $value->setStatus("erro de email");
        }else{
            $sql = "INSERT INTO usuarios(email,nome,senha) VALUES (:email,:nome,:senha);";
            $otherpstm = $db->execSql($sql);
            $otherpstm->bindParam(':email', $email);
            $otherpstm->bindParam(':nome', $nome);
            $otherpstm->bindParam(':senha', $senha);
            $otherpstm->execute();
            $value->setStatus("cadastro ok");
        }
    }
    public function mudarSenha(usuariosVO $value){
        $db = new DB();
        $email = $value->getEmail();
        $senha = $value->getSenha();
        
        $sql = "SELECT COUNT(*) FROM usuarios where email = :email;";
        $db->getConnection();
        $pstm = $db->execSql($sql);
        $pstm->bindParam(':email', $email);
        $pstm->execute();

        if ($pstm->fetchColumn() == 0) { 
            $value->setStatus("erro de email");
        }else{
            $sql = "UPDATE usuarios SET senha = :senha WHERE email = :email";
            $otherpstm = $db->execSql($sql);
            $otherpstm->bindParam(':email', $email);
            $otherpstm->bindParam(':senha', $senha);
            $otherpstm->execute();

            $value->setStatus("senha alterada");
        }
    }
}
