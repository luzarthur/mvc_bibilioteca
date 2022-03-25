<?php
class usuariosDAO
{
    public function verifEmail(usuariosVO $value)
    {
        $db = new DB();
        $email = $value->getEmail();

        $sql = "SELECT COUNT(*) FROM usuarios where email = :email;";
        $db->getConnection();
        $pstm = $db->execSql($sql);
        $pstm->bindParam(':email', $email);
        $pstm->execute();

        if ($pstm->fetchcolumn() == 0) {
            $value->setStatus("nao existe");
        }
    }

    public function verifLogin(usuariosVO $value)
    {
        $db = new DB();
        $email = $value->getEmail();
        $senha = $value->getSenha();

        $this->verifEmail($value);
        if ($value->getStatus() == "nao existe") {
            $value->setStatus("erro de email");
        } else {
            $db->getConnection();
            $sql = "SELECT COUNT(*) FROM usuarios WHERE email = :email and senha = :senha;";
            $otherpstm = $db->execSql($sql);
            $otherpstm->bindParam(':email', $email);
            $otherpstm->bindParam(':senha', $senha);
            $otherpstm->execute();

            if ($otherpstm->fetchColumn() == 0) {
                $value->setStatus("erro de senha");
            } else {
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

        $this->verifEmail($value);
        if ($value->getStatus() == "nao existe") {
            $db->getConnection();
            $sql = "INSERT INTO usuarios(email,nome,senha) VALUES (:email,:nome,:senha);";
            $otherpstm = $db->execSql($sql);
            $otherpstm->bindParam(':email', $email);
            $otherpstm->bindParam(':nome', $nome);
            $otherpstm->bindParam(':senha', $senha);
            $otherpstm->execute();
            $value->setStatus("cadastro ok");
        } else {
            $value->setStatus("erro de email");
        }
    }
    public function mudarSenha(usuariosVO $value)
    {
        $db = new DB();
        $email = $value->getEmail();
        $senha = $value->getSenha();

        $this->verifEmail($value);
        if ($value->getStatus() == "nao existe") {
            $value->setStatus("erro de email");
        } else {
            $db->getConnection();
            $sql = "UPDATE usuarios SET senha = :senha WHERE email = :email";
            $otherpstm = $db->execSql($sql);
            $otherpstm->bindParam(':email', $email);
            $otherpstm->bindParam(':senha', $senha);
            $otherpstm->execute();

            $value->setStatus("senha alterada");
        }
    }

    public function deletar(usuariosVO $value)
    {
        $this->verifLogin($value);
        $status = $value->getStatus();
        if ($status == "login ok") {
            $db = new DB();
            $email = $value->getEmail();
            $senha = $value->getSenha();

            $sql = "DELETE FROM usuarios where email = :email AND senha = :senha;";
            $db->getConnection();
            $ottherpstm = $db->execSql($sql);
            $ottherpstm->bindParam(':email', $email);
            $ottherpstm->bindParam(':senha', $senha);
            $ottherpstm->execute();
            $value->setStatus("conta deletada");
        } else {
        }
    }
}
