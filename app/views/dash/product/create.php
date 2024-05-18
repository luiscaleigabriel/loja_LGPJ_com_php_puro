<?php $this->start('style') ?>
<link rel="stylesheet" href="assets/css/dashformtable.css" />
<?php $this->stop() ?>

<?= $this->layout('dash/master') ?>

<?php $this->insert('dash/partials/header') ?>

<div class="dash--title">
    <h2 class="dash__title">Novo Produto</h2>
    <a href="/products" class="btn btn-primary">Voltar</a>
</div>

<form action="" method="post" class="form--main" enctype="multipart/form-data">
    <div class="form-sencundary">
        <div class="form-left">
            <div class="form-group">
                <div class="form-group__div row">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" placeholder="Nome" />
                </div>
                <div class="form-group__div row">
                    <label for="description">Descrição</label>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group__div row">
                    <label for="price">Preço</label>
                    <input type="text" name="price" id="price" />
                </div>
            </div>

            <div class="form-group foot">
            <h2 class="form_title">Mídia</h2>
                <div class="form-group__div row">
                    <label for="image">Imagem</label>
                    <input type="file" name="image" id="image" />
                </div>
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
                        <option value="1">sansung</option>
                        <option value="0">sansung</option>
                    </select>
                </div>
                <div class="form-group__div row">
                    <label for="subcategory">SubCategoria</label>
                    <select name="subcategory" id="subcategory">
                        <option value="1">sansung</option>
                        <option value="0">sansung</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="form-btns">
        <button type="submit" class="btn btn-primary">Salvar</button> <a href="/category" class="btn btn-secundary">Cancelar</a>
    </div>
</form>