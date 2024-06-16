<?php $this->start('style') ?>
<link rel="stylesheet" href="assets/css/dashformtable.css" />
<?php $this->stop() ?>

<?= $this->layout('dash/master') ?>

<?php $this->insert('dash/partials/header') ?>

<div class="dash--title">
    <h2 class="dash__title">Atualizar Produto</h2>
    <a href="/products" class="btn btn-primary">Voltar</a>
</div>

<form action="/updateproduct" method="post" class="form--main" enctype="multipart/form-data">
    <?= getToken() ?>
    <input type="hidden" name="id" value="<?= $product->id ?>">
    <div class="form-sencundary">
        <div class="form-left">
            <div class="form-group">
                <div class="form-group__div row">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" placeholder="Nome" value="<?= $product->name ?>" />
                    <?= flash('name') ?>
                </div>
                <div class="form-group__div row">
                    <label for="description">Descrição</label>
                    <textarea name="description" id="description" cols="30" rows="10">
                    <?= $product->description ?>
                    </textarea>
                    <?= flash('description') ?>
                </div>
                <div class="form-group__div row">
                    <label for="price">Preço</label>
                    <input type="text" name="price" id="price" value="<?= $product->price ?>" />
                    <?= flash('price') ?>
                </div>
                <div class="form-group__div row">
                    <label for="quantity">Quantidade</label>
                    <input type="number" name="quantity" id="quantity" value="<?= $product->quantity ?>" />
                    <?= flash('quantity') ?>
                </div>
            </div>

            <div class="form-group foot">
                <h2 class="form_title">Mídia</h2>
                <div class="form-group__div row">
                    <label for="file">Imagem</label>
                    <input type="file" name="file" />
                </div>
                <?= flash('file') ?>
            </div>
        </div>
        <div class="form-rigth">
            <div class="form-group">
                <div class="form-group__div row">
                    <label for="status">Status do produto</label>
                    <select name="status" id="status">
                        <option value="1">Activo</option>
                        <option value="0">Bloqueado</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group__div row">
                    <h2 class="form_title">Categoria do produto</h2>
                    <label for="category">Categoria</label>
                    <select name="category" id="category">
                        <?php foreach($instances['categories']::all() as $category): ?>
                            <option <?= $product->idcategory === $category->id ? 'selected':''?>  value="<?= $category->id?>"><?= $category->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group__div row">
                    <label for="subcategory">SubCategoria</label>
                    <select name="subcategory" id="subcategory">
                    <?php foreach($instances['subCategories']::all() as $subCategory): ?>
                            <option <?= $product->idsubcategory === $subCategory->id ? 'selected':''?> value="<?= $subCategory->id ?>">
                                <?= $subCategory->name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="form-btns">
        <button type="submit" class="btn btn-primary">Atualizar</button> <a href="/category" class="btn btn-secundary">Cancelar</a>
    </div>
</form>