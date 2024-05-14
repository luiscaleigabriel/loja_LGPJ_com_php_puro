<?php $this->start('style') ?>
<link rel="stylesheet" href="assets/css/dashformtable.css" />
<?php $this->stop() ?>

<?= $this->layout('dash/master') ?>

<?php $this->insert('dash/partials/header') ?>

<div class="dash--title">
    <h2 class="dash__title">Novo Usuário</h2>
    <a href="/users" class="btn btn-primary">Voltar</a>
</div>

<form action="" method="post" class="form--main">
    <div class="form-group">
        <div class="form-group__div">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" placeholder="Nome" />
        </div>
        <div class="form-group__div">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" />
        </div>
        <div class="form-group__div row">
            <label for="phone">Telefone</label>
            <input type="text" name="phone" id="phone" placeholder="Nº de Telefone" />
        </div>
        <div class="form-group__div row row">
            <label for="address">Endereço</label>
            <textarea name="address" id="address" cols="30" rows="4" placeholder="Endereço"></textarea>
        </div>
    </div>

    <div class="form-btns">
        <button type="submit" class="btn btn-primary">Salvar</button> <a href="/category" class="btn btn-secundary">Cancelar</a>
    </div>
</form>