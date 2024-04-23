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

<!-- start settings -->
<section class="settings">
    <div class="settings--content wrapper">
        <?php $this->insert('partials/settingpainel') ?>
        <div class="settings--right">
            <div class="form--content">
                <h3 class="form__title">Alterar Senha</h3>
                <form action="" class="form">
                    <div class="form-group">
                        <label for="password1">Senha actual</label>
                        <input type="password" name="password1" id="password1" placeholder="Digite a senha actual" />
                    </div>
                    <div class="form-group">
                        <label for="passwordN">Nova Senha</label>
                        <input type="password" name="passwordN" id="passwordN" placeholder="Digite a nova senha" />
                    </div>
                    <div class="form-group">
                        <label for="passwordC">Confirme senha</label>
                        <input type="password" name="passwordC" id="passwordC" placeholder="Digite novamente a senha" />
                    </div>
                    <div class="form--btn">
                        <button class="btn btn-primary" type="submit">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- end settings -->