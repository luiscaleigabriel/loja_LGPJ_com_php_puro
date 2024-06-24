<?= $this->layout('master') ?>

<?php

use app\core\CartInfo;

 $this->start('style') ?>
<link rel="stylesheet" href="assets/css/forms.css">
<?php $this->stop() ?>

<div class="clearpositionMobile"></div>

<!-- start source -->
<section class="source">
    <div class="source--content wrapper">
        <p class="source--content__text">
            <span class="source--content__color">Home</span> / Checkout
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
<section id="checkout" class="settings">
<form action="/payment" method="POST">
    <div class="settings--content wrapper">    
      <div class="paniel-orders">
        <div class="form--content">
            <h3 class="form__title">Lista de produtos</h3>
            <ul class="list--products">
              <?php foreach(CartInfo::getCart() as $product): ?>
                <li><span><?= $product->getName() ?> x <?= $product->getQuantity ()?></span> <span>Kz <?= number_format($product->getPrice(), 2, ',', '.') ?></span></li>
              <?php endforeach; ?>
            </ul>
            <hr class="hr">
            <ul class="list--products">
              <li> <span class="spanText">Subtotal</span> <span class="spanTotal"><?= number_format($instances['cart']->getTotal(), 2, ',', '.') ?></span></li>
              <li> <span class="spanText">Entrega</span> <span class="spanTotal"><?= number_format(2000, 2, ',', '.') ?></span></li>
            </ul>
            <hr class="hr">
            <ul class="list--products">
              <li> <span class="spanTotal">Total</span> <span class="spanTotal"><?= number_format($instances['cart']->getTotal() +  2000, 2, ',', '.') ?></span></li>
            </ul>
        </div>
        <div class="form--content">
            <h3 class="form__title">Detalhes do pagamento</h3>
            <ul class="list--products">
              <div class="form">
                <div class="form-group">
                    <label for="card">Número do Cartão</label>
                    <input type="number" name="card" id="card" placeholder="Cartão de debito válido" />
                </div>
              </div>
              <div class="form--btn">
                  <button class="btn btn-primary" type="submit">Finalizar Compra</button>
              </div>
            </ul>
        </div>
      </div>

        <div class="settings--right">
            <div class="form--content">
                <h3 class="form__title">Informações Pessoais</h3>
                <div  class="form">
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
                        <textarea name="address" id="address" cols="20" rows="10" ><?= $user->address ?>
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</section>
<!-- end settings -->