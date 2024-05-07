<?= $this->layout('master') ?>

<?php $this->start('style') ?>
<link rel="stylesheet" href="assets/css/forms.css" />
<?php $this->stop() ?>

<div class="clearpositionMobile"></div>

<!-- start source -->
<section class="source">
    <div class="source--content wrapper">
        <p class="source--content__text">
            <span class="source--content__color">Home</span> / Login
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
        <div class="settings--rightcontentLogin">
            <div class="form--content">
                <form action="/login" method="POST" class="form login">
                    <h2 class="form__title">Bem vindo de volta</h2>
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="Email" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder="Senha" />
                    </div>
                    <div class="form--btn">
                        <button class="btn btn-primary" type="submit">Entrar</button>

                        <a href="/register">Esqeceu a senha</a>
                    </div>
                </form>
            </div>

            <a class="settings--rightcontentLogin__link" href="/register">Não tens uma conta? cadastre-se</a>
        </div>
    </div>
</section>
<!-- end settings -->