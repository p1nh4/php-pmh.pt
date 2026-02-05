<?php

namespace App\DAO;

use App\Model\Marca;

final class MarcaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(Marca $model): Marca
    {
        return ($model->id == null) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Marca $model): Marca
    {
        $sql = "INSERT INTO marca (nome, pais_origem) VALUES (?, ?)";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->pais_origem);
        $stmt->execute();

        $model->id = parent::$conexao->lastInsertId();
        return $model;
    }

    public function update(Marca $model): Marca
    {
        $sql = "UPDATE marca SET nome=?, pais_origem=? WHERE id=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->pais_origem);
        $stmt->bindValue(3, $model->id);
        $stmt->execute();

        return $model;
    }

    public function selectById(int $id): ?Marca
    {
        $sql = "SELECT * FROM marca WHERE id=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchObject("App\Model\Marca");
    }

    public function select(): array
    {
        $sql = "SELECT * FROM marca";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(DAO::FETCH_CLASS, "App\Model\Marca");
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM marca WHERE id=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}