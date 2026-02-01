<?php

namespace App\DAO;

use App\Model\Cliente;

final class ClienteDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save(Cliente $model) : Cliente
    {
        return ($model->id == null) ? $this->insert($model) : $this->update($model);
    }

    public function insert(Cliente $model) : Cliente
    {
        $sql = "INSERT INTO cliente (nome, endereco, telefone, email, senha) VALUES (?, ?, ?, ?, ?)";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->endereco);
        $stmt->bindValue(3, $model->telefone);
        $stmt->bindValue(4, $model->email);
        $stmt->bindValue(5, $model->senha);
        $stmt->execute();

        $model->id = parent::$conexao->lastInsertId();
        return $model;
    }

    public function update(Cliente $model) : Cliente
    {
        $sql = "UPDATE cliente SET nome=?, endereco=?, telefone=?, email=?, senha=? WHERE id=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->endereco);
        $stmt->bindValue(3, $model->telefone);
        $stmt->bindValue(4, $model->email);
        $stmt->bindValue(5, $model->senha);
        $stmt->bindValue(6, $model->id);
        $stmt->execute();

        return $model;
    }

    public function selectById(int $id) : ?Cliente
    {
        $sql = "SELECT * FROM cliente WHERE id=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchObejct("App\Model\Cliente");  
    }

    public function select() : array
    {
          $sql = "SELECT * from cliente";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(DAO::FETCH_CLASS, "App\Model\Cliente");
    }

    public function delete(int $id) : bool 
    {
        $sql = "DELETE * FROM cliente WHERE id=?";

        $stmt = parent::$conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        return $stmt->execute();
    }
}