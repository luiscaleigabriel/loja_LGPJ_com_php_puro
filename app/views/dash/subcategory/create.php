<?php $this->start('style') ?>
<link rel="stylesheet" href="assets/css/dashformtable.css" />
<?php $this->stop() ?>

<?= $this->layout('dash/master') ?>

<?php $this->insert('dash/partials/header') ?>

<div class="dash--title">
    <h2 class="dash__title">Nova Categoria</h2>
    <a href="/subcategory" class="btn btn-primary">Voltar</a>
</div>

<form action="" method="post" class="form--main">
    <div class="form-group">
        <div class="form-group__div row">
            <label for="category">Categoria</label>
            <select name="category" id="category">
                <option value="1">Sansung</option>
                <option value="2">Sansung</option>
                <option value="3">Sansung</option>
                <option value="4">Sansung</option>
            </select>
        </div>
        <div class="form-group__div">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" placeholder="Nome" />
        </div>
        <div class="form-group__div">
            <label for="slug">Slug</label>
            <input type="text" disabled name="slug" id="slug" placeholder="Slug" />
        </div>
    </div>

    <div class="form-btns">
        <button type="submit" class="btn btn-primary">Salvar</button> <a href="/category" class="btn btn-secundary">Cancelar</a>
    </div>
</form>