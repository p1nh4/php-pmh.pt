<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div>
        <?php 
        include VIEWS . '/Includes/menu.php';
        
        // Buscar dados para os selects
        $categorias = (new App\Model\Categoria())->getAllRows();
        $marcas = (new App\Model\Marca())->getAllRows();
        $fornecedores = (new App\Model\Fornecedor())->getAllRows();
        ?>
        
        <h1>Cadastro produto</h1>
        <?= $model->getErrors() ?>
        <form method="post" action="/produto/cadastro" class="p-5">
            <input name="id" type="hidden" value="<?= $model->id ?>" />
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" value="<?= $model->nome ?>" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3"><?= $model->descricao ?></textarea>
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label">Preço:</label>
                <input type="number" step="0.01" value="<?= $model->preco ?>" class="form-control" id="preco" name="preco" required>
            </div>
            <div class="mb-3">
                <label for="validade" class="form-label">Validade:</label>
                <input type="date" value="<?= $model->validade ?>" class="form-control" id="validade" name="validade">
            </div>
            <div class="mb-3">
                <label for="estoque" class="form-label">Estoque:</label>
                <input type="number" value="<?= $model->estoque ?>" class="form-control" id="estoque" name="estoque">
            </div>
            <div class="mb-3">
                <label for="categoria_id" class="form-label">Categoria:</label>
                <select class="form-control" id="categoria_id" name="categoria_id">
                    <option value="">Selecione...</option>
                    <?php foreach ($categorias as $cat): ?>
                        <option value="<?= $cat->id ?>" <?= $model->categoria_id == $cat->id ? 'selected' : '' ?>>
                            <?= $cat->nome ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="marca_id" class="form-label">Marca:</label>
                <select class="form-control" id="marca_id" name="marca_id">
                    <option value="">Selecione...</option>
                    <?php foreach ($marcas as $marca): ?>
                        <option value="<?= $marca->id ?>" <?= $model->marca_id == $marca->id ? 'selected' : '' ?>>
                            <?= $marca->nome ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="fornecedor_id" class="form-label">Fornecedor:</label>
                <select class="form-control" id="fornecedor_id" name="fornecedor_id">
                    <option value="">Selecione...</option>
                    <?php foreach ($fornecedores as $forn): ?>
                        <option value="<?= $forn->id ?>" <?= $model->fornecedor_id == $forn->id ? 'selected' : '' ?>>
                            <?= $forn->nome ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>