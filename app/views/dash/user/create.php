<?php $this->start('style') ?>
<link rel="stylesheet" href="assets/css/dashformtable.css" />
<?php $this->stop() ?>

<?= $this->layout('dash/master') ?>

<?php $this->insert('dash/partials/header') ?>

<div class="dash--title">
    <h2 class="dash__title">Novo Usuário</h2>
    <a href="/users" class="btn btn-primary">Voltar</a>
</div>

<form <?= isset($user) ? 'action="/userupdate"' : 'action="/user/create"' ?> method="post" class="form--main">
    <?= getToken() ?>
    <?= isset($user) ? "<input type='hidden' name='id' value='$user->id' > " : ''?>
    <div class="form-group">
        <div class="form-group__div">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" placeholder="Nome" value="<?= isset($user) ? $user->name : ''?>" />
        </div>
        <div class="form-group__div">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" value="<?= isset($user) ? $user->email : ''?>" />
            <?= flash('email') ?>
        </div>
        <div class="form-group__div">
            <label for="gender">Género</label>
            <select name="gender" id="gender">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
            <?= flash('gender') ?>
        </div>
        <?= flash('gender') ?>
        <div class="form-group__div row">
            <label for="phone">Telefone</label>
            <input type="text" name="phone" id="phone" placeholder="Nº de Telefone" value="<?= isset($user) ? $user->phone : ''?>" />
            <?= flash('phone') ?>
        </div>
        <div class="form-group__div row row">
            <label for="address">Endereço</label>
            <textarea name="address" id="address" cols="30" rows="4" placeholder="Endereço">
            <?= isset($user) ? $user->address : ''?>
            </textarea>
            <?= flash('address') ?>
        </div>
    </div>

    <div class="form-btns">
        <button type="submit" class="btn btn-primary">Salvar</button> <a href="/category" class="btn btn-secundary">Cancelar</a>
    </div>
</form>