<?= $this->layout('master') ?>

<?php $this->start('style') ?>
<link rel="stylesheet" href="assets/css/carrocel.css" />
<?php $this->stop() ?>


<!-- start carrocel -->
<section class="carrocel--main">
    <section class="carrocel">
        <div class="carrocel--slider">
            <div class="carrocel--slider__slide" style="background-image: url(/assets/images/editors-keys-CtDrd7mWW6M-unsplash.jpg);">
                <div class="carrocel--slider--content">
                    <div class="product__name">Teclado Gamer</div>
                    <div class="product__description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Lorem ipsum dolor sit amet.</div>
                    <a href="#" class="carrocel--slider--content__btn">Ver mais</a>
                </div>
            </div>
            <div class="carrocel--slider__slide" style="background-image: url(/assets/images/jan-bottinger--kChshW17rw-unsplash.jpg);">
                <div class="carrocel--slider--content">
                    <div class="product__name">PC Gamer</div>
                    <div class="product__description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Lorem ipsum dolor sit amet.</div>
                    <a href="#" class="carrocel--slider--content__btn">Ver mais</a>
                </div>
            </div>
            <div class="carrocel--slider__slide" style="background-image: url(/assets/images/istockphoto-1434007139-170667a.webp);">
                <div class="carrocel--slider--content">
                    <div class="product__name">Notbook</div>
                    <div class="product__description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Lorem ipsum dolor sit amet.</div>
                    <a href="#" class="carrocel--slider--content__btn">Ver mais</a>
                </div>
            </div>
            <div class="carrocel--slider__slide" style="background-image: url(assets/images/monitor.jpg);">
                <div class="carrocel--slider--content">
                    <div class="product__name">BLACKVIEW</div>
                    <div class="product__description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Lorem ipsum dolor sit amet.</div>
                    <a href="#" class="carrocel--slider--content__btn">Ver mais</a>
                </div>
            </div>
            <div class="carrocel--slider__slide" style="background-image: url(assets/images/frankie-VghbBAYqUJ0-unsplash.jpg);">
                <div class="carrocel--slider--content">
                    <div class="product__name">GMouse</div>
                    <div class="product__description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Lorem ipsum dolor sit amet.</div>
                    <a href="#" class="carrocel--slider--content__btn">Ver mais</a>
                </div>
            </div>
            <div class="carrocel--slider__slide" style="background-image: url(assets/images/kari-shea-1SAnrIxw5OY-unsplash.jpg);">
                <div class="carrocel--slider--content">
                    <div class="product__name">Macbook</div>
                    <div class="product__description">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Lorem ipsum dolor sit amet.</div>
                    <a href="#" class="carrocel--slider--content__btn">Ver mais</a>
                </div>
            </div>
        </div>
        <div class="button">
            <button id="prev" ><i class="fa-solid fa-arrow-left" ></i></button>
            <button id="next" ><i class="fa-solid fa-arrow-right" ></i></button>
        </div>
    </section>
</section>
<!-- end caroucel -->

<!-- start aboutServices --> 
<div class="clearposition"></div> 
<section class="aboutServices">
    <div class="aboutServices--content wrapper">
        <div class="aboutServices--content__description">
            Produtos de qualidade
        </div>
        <div class="aboutServices--content__description">
            Entrega rápida
        </div>
        <div class="aboutServices--content__description">
            Até 14 dias para devolução
        </div>
        <div class="aboutServices--content__description">
            Suporte 24/7
        </div>
    </div>
</section>
<!-- end aboutServices -->

<!-- start categories --> 
<section class="categories">
    <div class="categories--content wrapper">
        <h2 class="categories__title">
            Categorias
        </h2>
        <div class="categories--category">
            <div class="categories--category__image">
                <img src="./assets/images/port-hp156-i7-1255u-fhd-slim-16g-512-ssd-w11h-prata.jpg" alt="categories" />
            </div>
            <a href="#">
                <p class="categories--category__text">
                <span>Laptops HP</span>
                <span>100 produtos</span>
            </p>
        </a>
            
        </div>
        <div class="categories--category">
            <div class="categories--category__image">
                <img src="./assets/images/kari-shea-1SAnrIxw5OY-unsplash.jpg" alt="categories" />
            </div>
            <a href="#">
                <p class="categories--category__text">
                <span>MacBook</span>
                <span>100 produtos</span>
            </p>
        </a>
            
        </div>   
        <div class="categories--category">
            <div class="categories--category__image">
                <img src="./assets/images/webcam-genius-qcam-6000-vermelha.jpg" alt="categories" />
            </div>
            <a href="#">
                <p class="categories--category__text">
                    <span>Câmara</span>
                    <span>100 produtos</span>
                </p>
            </a>
            
        </div>
        <div class="categories--category">
            <div class="categories--category__image">
                <img src="./assets/images/monitor-27-aoc-fhd-hdmi-vga-75hz-.jpg" alt="categories" />
            </div>
            <a href="#">
                <p class="categories--category__text">
                    <span>Monitores</span>
                    <span>100 produtos</span>
                </p>
            </a>
            
        </div>   
        <div class="categories--category">
            <div class="categories--category__image">
                <img src="./assets/images/tecladorato-mahnt-wifi-preto.jpg" alt="categories" />
            </div>
            <a href="#">
                <p class="categories--category__text">
                    <span>Teclado e mouse</span>
                    <span>100 produtos</span>
                </p>
            </a> 
        </div>   
        <div class="categories--category">
            <div class="categories--category__image">
                <img src="./assets/images/hp-officejet-e-aio-pro-9013-2218.jpg" alt="categories" />
            </div>
            <a href="#">
                <p class="categories--category__text">
                    <span>Impressoras</span>
                    <span>100 produtos</span>
                </p>
            </a>
        </div>   
        <div class="categories--category">
            <div class="categories--category__image">
                <img src="./assets/images/smartphone-blackview-bv9300-12gb256gb-torch-preto.jpg" alt="categories" />
            </div>
            <a href="#">
                <p class="categories--category__text">
                    <span>Smatphone</span>
                    <span>100 produtos</span>
                </p>
            </a>
        </div>   
        <div class="categories--category">
            <div class="categories--category__image">
                <img src="./assets/images/jan-bottinger--kChshW17rw-unsplash.jpg" alt="categories" />
            </div>
            <a href="#">
                <p class="categories--category__text">
                    <span>PC Gamer</span>
                    <span>100 produtos</span>
                </p>
            </a>
        </div>   
    </div>
</section>
<!-- start categories --> 

<!-- start products --> 
<section class="products">
    <div class="products--content wrapper">
        <h1 class="products__title">
            Popular
        </h1>
        <?php if(!empty($products)): ?>
            <?php foreach($products as $product): ?>
                <div class="products--product">
                    <div class="products--product__image">
                        <img src="<?= $product->image ?>" alt="product" />
                    </div>
                    <a class="products--product__name" href="/details?id=<?= $product->id ?>"><?= $product->name ?></a>
                    <p class="products--product__price">
                        <span class="products--product__priceActual">Kz <?= number_format($product->price, 2, ',', '.') ?></span> 
                        <span class="products--product__pricePrev">
                    </p>
                    <a class="products--product__add" href="/cart/add/?id=<?= $product->id ?>">Add no carrinho - <?= $instances['cart']->getQuantity($product) ?> </a>
                    <a class="products--product__details" href="/details?id=<?= $product->id ?>">Detalhes</i></a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h2>Nenhum produto encontrado</h2>
        <?php endif; ?>
    </div>
</section>
<!-- end products --> 

<?php $this->start('js') ?>
<script src="assets/js/carrocel.js"></script>
<?php $this->stop() ?>