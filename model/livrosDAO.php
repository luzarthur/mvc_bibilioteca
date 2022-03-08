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
        $genero = $value->getGenero();

        $this->verif_livro($value);
        if ($value->getMsg() == "nao existe") {
            $sql = "INSERT INTO livros (nome, autor, genero) VALUES (:nome, :autor, :genero)";
            $db->getConnection();
            $pstm = $db->execSql($sql);
            $pstm->bindParam(':nome',$nome);
            $pstm->bindParam(':autor',$autor);
            $pstm->bindParam(':genero',$genero);
            $pstm->execute();
            $value->setMsg("livro cadastrado");
        } else {
            $value->setMsg("livro ja existe");
        }
    }
    public function deletar(livrosVO $value)
    {
        $db = new DB();
        $id = $value->getID();

        $sql = "SELECT COUNT(*) FROM livros WHERE id = :id;";
        $db->getConnection();
        $pstm = $db->execSql($sql);
        $pstm->bindParam(':id',$id);
        $pstm->execute();
        
        if($pstm->fetchColumn() == 0){
            $value->setMsg("nao existe");
        }else{
            $sql = "DELETE FROM livros where id = :id;";
            $pstm = $db->execSql($sql);
            $pstm->bindParam(':id',$id);
            $pstm->execute();
        }
    }

    public function listAll(){
        $sql = "SELECT * FROM livros;";
        $this->listar($sql);
    }
    public function listar($sql){
        $sql = "";
        $db = new DB();
        $db->getConnection();
        $pstm = $db->execSql($sql);
        $pstm->execute();

        while($row = $pstm->fetch_assoc()){
            $array[] = array($row["id"],$row["nome"],$row["autor"],$row["genero"],$row["status"]);
        }
        return $array;
    }
}