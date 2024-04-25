<?= $this->layout('master') ?>

<?php $this->start('style') ?>
<link rel="stylesheet" href="assets/css/forms.css">
<?php $this->stop() ?>

<div class="clearpositionMobile"></div>

<!-- start source -->
<section class="source">
    <div class="source--content wrapper">
        <p class="source--content__text">
            <span class="source--content__color">Home</span> / Contacte-nos
        </p>
    </div>
</section>
<!-- end source -->

<!-- start about-us -->
<section class="about-us">
    <div class="about-us--content wrapper">
        <div class="about-us--text">
            <h2 class="about-us__title">Entre em contacto conosco</h2>
            <p>
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content.
            </p>
            <p>
                Luanda/Benfica <br />
                Talatona Rua 4 <br />
                Casa nº 1234 <br />
                <span>
                    (+244) 999 999 999 <br />
                    lojalgpj@gmail.com
                </span>
            </p>
        </div>
        <div class="about-us--form">
            <form action="" class="form">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name"  />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" />
                </div>
                <div class="form-group">
                    <label for="assunto">Assunto</label>
                    <input type="text" name="assunto" id="assunto" />
                </div>
                <div class="form-group">
                    <label for="message">Mensagem</label>
                    <textarea name="message" id="message" cols="30" rows="10" ></textarea>
                </div>
                <div class="form--btn">
                    <button class="btn btn-primary" type="submit">Enviar mensagem</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- end about-us -->
