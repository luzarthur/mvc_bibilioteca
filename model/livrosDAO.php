<?php
class livrosDAO
{
    public function verif_livro(livrosVO $value)
    {
        $db = new DB();
        $nome = $value->getNome();
        $autor = $value->getAutor();

        $sql = "SELECT COUNT(*) FROM livros where nome = :nome AND autor = :autor";
        $db->getConnection();
        $pstm = $db->execSql($sql);
        $pstm->bindParam(':nome', $nome);
        $pstm->bindParam(':autor', $autor);
        $pstm->execute();

        if ($pstm->fetchColumn() == 1) {
            $value->setMsg("existe");
        } else {
            $value->setMsg("nao existe");
        }
    }
    public function cadastrar(livrosVO $value)
    {
        $db = new DB();
        $nome = $value->getNome();
        $autor = $value->getAutor();

        $this->verif_livro($value);
        if ($value->getMsg() == "nao existe") {
            $sql = "INSERT INTO livros (nome, autor, genero) VALUES (:nome, :autor, :genero)";
            $db->getConnection();
            $pstm = $db->execSql($sql);
            $pstm->bindParam(':nome', $nome);
            $pstm->bindParam(':autor', $autor);
            $pstm->bindParam(':genero', $autor);
            $pstm->execute();
            $value->setMsg("livro cadastrado");
        } else {
            $value->setMsg("livro ja existe");
        }
    }
}
