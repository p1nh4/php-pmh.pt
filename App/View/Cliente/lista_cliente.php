<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div>
        <?php include VIEWS . '/Includes/menu.php' ?>
        <h1>Lista clientes</h1>

        <a href="/cliente/cadastro">Novo cliente</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>   
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $cliente): ?>
                    <tr>
                        <td> <?= $cliente->id ?> </td>
                        <td> <a href="/cliente/cadastro?id=<?= $cliente->id ?>"><?= $cliente->nome ?> </a></td>
                        <td> <?= $cliente->email ?> </td>
                        <td> <a href="/cliente/delete?id=<?= $cliente->id ?>">Remover</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>