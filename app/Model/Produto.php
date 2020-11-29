<?php
namespace Mini\Model;

use Mini\Core\Model;

class Produto extends Model
{

    public function getAllProdutos()
    {
        $sql = "SELECT id, descricao, unidade FROM produtos";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function add($descricao, $unidade)
    {
        $sql = "INSERT INTO produtos (descricao, unidade) VALUES (:descricao, :unidade)";
        $query = $this->db->prepare($sql);
        $parameters = array(':descricao' => $descricao, ':unidade' => $unidade);

        $query->execute($parameters);
    }

    public function delete($produto_id)
    {
        $sql = "DELETE FROM produtos WHERE id = :produto_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':produto_id' => $produto_id);

        $query->execute($parameters);
    }

    public function getProduto($produto_id)
    {
        $sql = "SELECT id, descricao, unidade FROM produtos WHERE id = :produto_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':produto_id' => $produto_id);

        $query->execute($parameters);

        return ($query->rowcount() ? $query->fetch() : false);
    }

    public function update($descricao, $unidade, $produto_id)
    {
        $sql = "UPDATE produtos SET descricao = :descricao, unidade = :unidade WHERE id = :produto_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':descricao' => $descricao, ':unidade' => $unidade, ':produto_id' => $produto_id);

        $query->execute($parameters);
    }

    public function getAmountOfProdutos()
    {
        $sql = "SELECT COUNT(id) AS amount_of_produtos FROM produtos";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_produtos;
    }
}
