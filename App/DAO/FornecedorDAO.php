<?php

namespace App\DAO;

use App\Model\Fornecedor;

final class FornecedorDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(Fornecedor $model): Fornecedor
    {
        return ($model->id == null) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Fornecedor $model): Fornecedor
    {
        $sql = "INSERT INTO fornecedor (nome, contato, telefone, email, senha) VALUES (?, ?, ?, ?, ?)";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->contato);
        $stmt->bindValue(3, $model->telefone);
        $stmt->bindValue(4, $model->email);
        $stmt->bindValue(5, $model->senha);
        $stmt->execute();

        $model->id = parent::$conexao->lastInsertId();
        return $model;
    }

    public function update(Fornecedor $model): Fornecedor
    {
        $sql = "UPDATE fornecedor SET nome=?, contato=?, telefone=?, email=?, senha=? WHERE id=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->contato);
        $stmt->bindValue(3, $model->telefone);
        $stmt->bindValue(4, $model->email);
        $stmt->bindValue(5, $model->senha);
        $stmt->bindValue(6, $model->id);
        $stmt->execute();

        return $model;
    }

    public function selectById(int $id): ?Fornecedor
    {
        $sql = "SELECT * FROM fornecedor WHERE id=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchObject("App\Model\Fornecedor");
    }

    public function select(): array
    {
        $sql = "SELECT * FROM fornecedor";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(DAO::FETCH_CLASS, "App\Model\Fornecedor");
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM fornecedor WHERE id=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}