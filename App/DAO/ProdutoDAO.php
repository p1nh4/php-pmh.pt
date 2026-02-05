<?php

namespace App\DAO;

use App\Model\Produto;

final class ProdutoDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(Produto $model): Produto
    {
        return ($model->id == null) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Produto $model): Produto
    {
        $sql = "INSERT INTO produto (nome, descricao, preco, validade, estoque, categoria_id, marca_id, fornecedor_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->preco);
        $stmt->bindValue(4, $model->validade);
        $stmt->bindValue(5, $model->estoque);
        $stmt->bindValue(6, $model->categoria_id);
        $stmt->bindValue(7, $model->marca_id);
        $stmt->bindValue(8, $model->fornecedor_id);
        $stmt->execute();

        $model->id = parent::$conexao->lastInsertId();
        return $model;
    }

    public function update(Produto $model): Produto
    {
        $sql = "UPDATE produto 
                SET nome=?, descricao=?, preco=?, validade=?, estoque=?, categoria_id=?, marca_id=?, fornecedor_id=? 
                WHERE id=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->preco);
        $stmt->bindValue(4, $model->validade);
        $stmt->bindValue(5, $model->estoque);
        $stmt->bindValue(6, $model->categoria_id);
        $stmt->bindValue(7, $model->marca_id);
        $stmt->bindValue(8, $model->fornecedor_id);
        $stmt->bindValue(9, $model->id);
        $stmt->execute();

        return $model;
    }

    public function selectById(int $id): ?Produto
    {
        $sql = "SELECT * FROM produto WHERE id=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchObject("App\Model\Produto");
    }

    public function select(): array
    {
        $sql = "SELECT * FROM produto";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(DAO::FETCH_CLASS, "App\Model\Produto");
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM produto WHERE id=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}