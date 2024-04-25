<?= $this->layout('master') ?>

<?php $this->start('style') ?>
<link rel="stylesheet" href="assets/css/forms.css" />
<?php $this->stop() ?>

<div class="clearpositionMobile"></div>

<!-- start source -->
<section class="source">
    <div class="source--content wrapper">
        <p class="source--content__text">
            <span class="source--content__color">Home</span> / Registro
        </p>
    </div>
</section>
<!-- end source -->

<!-- start settings -->
<section class="settings">
    <div class="settings--content wrapper">
        <div class="settings--rightcontentLogin">
            <div class="form--content">
                <form action="" class="form">
                    <h2 class="form__title">Registre-se Agora</h2>
                    <div class="form-group">
                        <input type="text" name="name" id="name" placeholder="Nome Completo" />
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="Email" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" id="phone" placeholder="Telefoe" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder="Senha" />
                    </div>
                    <div class="form-group">
                        <input type="passwordc" name="passwordc" id="passwordc" placeholder="Confirme a senha" />
                    </div>
                    <div class="form--btn">
                        <button class="btn btn-primary" type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>

            <a class="settings--rightcontentLogin__link" href="/login">Já tem uma conta? Faça Login</a>
        </div>
    </div>
</section>
<!-- end settings -->