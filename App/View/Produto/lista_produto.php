<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div>
        <?php include VIEWS . '/Includes/menu.php' ?>
        <h1>Lista produtos</h1>

        <a href="/produto/cadastro">Novo produto</a>

        <?= $model->getErrors() ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Estoque</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model->rows as $produto): ?>
                    <tr>
                        <td> <?= $produto->id ?> </td>
                        <td> <a href="/produto/cadastro?id=<?= $produto->id ?>"><?= $produto->nome ?> </a></td>
                        <td> <?= number_format($produto->preco, 2, ',', '.') ?> €</td>
                        <td> <?= $produto->estoque ?> </td>
                        <td> <a href="/produto/delete?id=<?= $produto->id ?>">Remover</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>