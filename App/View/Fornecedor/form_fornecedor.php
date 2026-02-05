<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro fornecedores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div>
        <?php include VIEWS . '/Includes/menu.php' ?>
        <h1>Cadastro fornecedor</h1>
        <?= $model->getErrors() ?>
        <form method="post" action="/fornecedor/cadastro" class="p-5">
            <input name="id" type="hidden" value="<?= $model->id ?>" />
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" value="<?= $model->nome ?>" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="contato" class="form-label">Contato:</label>
                <input type="text" value="<?= $model->contato ?>" class="form-control" id="contato" name="contato">
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" value="<?= $model->telefone ?>" class="form-control" id="telefone" name="telefone" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" value="<?= $model->email ?>" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="text" value="<?= $model->senha ?>" class="form-control" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>