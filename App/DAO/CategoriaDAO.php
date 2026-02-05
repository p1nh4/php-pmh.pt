<?php

namespace App\DAO;

use App\Model\Categoria;

final class CategoriaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(Categoria $model): Categoria
    {
        return ($model->id == null) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Categoria $model): Categoria
    {
        $sql = "INSERT INTO categoria (nome, descricao) VALUES (?, ?)";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->descricao);
        $stmt->execute();

        $model->id = parent::$conexao->lastInsertId();
        return $model;
    }

    public function update(Categoria $model): Categoria
    {
        $sql = "UPDATE categoria SET nome=?, descricao=? WHERE id=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->descricao);
        $stmt->bindValue(3, $model->id);
        $stmt->execute();

        return $model;
    }

    public function selectById(int $id): ?Categoria
    {
        $sql = "SELECT * FROM categoria WHERE id=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchObject("App\Model\Categoria");
    }

    public function select(): array
    {
        $sql = "SELECT * FROM categoria";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(DAO::FETCH_CLASS, "App\Model\Categoria");
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM categoria WHERE id=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}