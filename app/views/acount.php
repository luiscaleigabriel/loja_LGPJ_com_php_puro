<?= $this->layout('master') ?>

<?php $this->start('style') ?>
<link rel="stylesheet" href="assets/css/forms.css" />
<?php $this->stop() ?>

<div class="clearpositionMobile"></div>

<!-- start source -->
<section class="source">
    <div class="source--content wrapper">
        <p class="source--content__text">
            <span class="source--content__color">Minha Conta</span> / Definições
        </p>
    </div>
</section>
<!-- end source -->
<?php if($instances['session']::has('__flash')): ?>
    <?php if($instances['session']::flashHas('success')):  ?>
        <div class="success">
            <?= $instances['session']::flashGet('success') ?>
        </div>
    <?php endif; ?>
    <?php if($instances['session']::flashHas('error')): ?>
        <div class="error">
            <?= $instances['session']::flashGet('error') ?>
        </div>
    <?php endif;  ?>
<?php endif; ?>
<!-- start settings -->
<section class="settings">
    <div class="settings--content wrapper">
        <?php $this->insert('partials/settingpainel') ?>
        <div class="settings--right">
            <div class="form--content">
                <h3 class="form__title">Informações Pessoais</h3>
                <form action="/user/update" method="POST" class="form">
                    <?= getToken() ?>
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" name="name" id="name" value="<?= $user->name ?>" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?= $user->email ?>" />
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefone</label>
                        <input type="text" name="phone" id="phone" value="<?= $user->phone ?>" />
                    </div>
                    <div class="form-group">
                        <label for="gender">Género</label>
                        <select name="gender" id="gender">
                            <option <?= $user->gender == 'M' ? 'selected' : '' ?> value="M">Masculino</option>
                            <option <?= $user->gender == 'F' ? 'selected' : '' ?>  value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Endereço</label>
                        <textarea name="address" id="address" cols="30" rows="10" ><?= $user->address ?>
                        </textarea>
                    </div>
                    <div class="form--btn">
                        <button class="btn btn-primary" type="submit">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- end settings -->