<?php $this->start('style') ?>
<link rel="stylesheet" href="assets/css/dashformtable.css" />
<?php $this->stop() ?>

<?= $this->layout('dash/master') ?>

<?php $this->insert('dash/partials/header') ?>

<div class="dash--title">
    <h2 class="dash__title">Atualizar Categoria</h2>
    <a href="/subcategory" class="btn btn-primary">Voltar</a>
</div>

<form action="/updatesubcategory" method="post" class="form--main">
  <input type="hidden" name="id" value="<?= $subcategory->id ?>" />
    <?= getToken() ?>
    <div class="form-group">
        <div class="form-group__div row">
            <label for="category">Categoria</label>
            <select name="category" id="category">
                <?php foreach($categories as $category): ?>
                    <option <?php if($subcategory->idcategory === $category->id) echo 'selected'; ?> value="<?= $category->id ?>"><?= $category->name ?></option>
                <?php endforeach; ?>
                <?= flash('category') ?>
            </select>
            
        </div>
        <div class="form-group__div">
            <label for="name">Nome</label>
            <!-- <input type="text" name="name" id="name" placeholder="Nome" value="<?= $subcategory->name ?>" /> -->
            <?= flash('name') ?>
        </div>
        <div class="form-group__div">
            <label for="slug">Slug</label>
            <input type="text" disabled name="slug" id="slug" placeholder="Slug" value="<?= $subcategory->slug ?>" />
        </div>
    </div>

    <div class="form-btns">
        <button type="submit" class="btn btn-primary">Atualizar</button> <a href="/category" class="btn btn-secundary">Cancelar</a>
    </div>
</form>