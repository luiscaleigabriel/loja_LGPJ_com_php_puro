<?= $this->layout('master') ?>

<?php $this->start('style') ?>
<link rel="stylesheet" href="assets/css/carrocel.css" />
<?php $this->stop() ?>


<!-- start carrocel -->
<section class="carrocel--main">
    <section class="carrocel">
        <div class="carrocel--slider">
            <div class="carrocel--slider__slide" style="background-image: url(assets/images/frankie-VghbBAYqUJ0-unsplash.jpg);">
                <div class="carrocel--slider--content">
                    <div class="product__name">Mouse G</div>
                    <div class="product__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, illo. Nihil qui eligendi molestias laborum iste in sunt eius similique.</div>
                    <a href="#" class="carrocel--slider--content__btn">Ver mais</a>
                </div>
            </div>
            <div class="carrocel--slider__slide" style="background-image: url(assets/images/image2.jpg);">
                <div class="carrocel--slider--content">
                    <div class="product__name">Monitor</div>
                    <div class="product__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, illo. Nihil qui eligendi molestias laborum iste in sunt eius similique.</div>
                    <a href="#" class="carrocel--slider--content__btn">Ver mais</a>
                </div>
            </div>
            <div class="carrocel--slider__slide" style="background-image: url(assets/images/image3.jpg);">
                <div class="carrocel--slider--content">
                    <div class="product__name">NotBook HP</div>
                    <div class="product__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, illo. Nihil qui eligendi molestias laborum iste in sunt eius similique.</div>
                    <a href="#" class="carrocel--slider--content__btn">Ver mais</a>
                </div>
            </div>
            <div class="carrocel--slider__slide" style="background-image: url(assets/images/image4.jpg);">
                <div class="carrocel--slider--content">
                    <div class="product__name">Teclado LG</div>
                    <div class="product__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, illo. Nihil qui eligendi molestias laborum iste in sunt eius similique.</div>
                    <a href="#" class="carrocel--slider--content__btn">Ver mais</a>
                </div>
            </div>
            <div class="carrocel--slider__slide" style="background-image: url(assets/images/product-1.jpg);">
                <div class="carrocel--slider--content">
                    <div class="product__name">Apple Pad</div>
                    <div class="product__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, illo. Nihil qui eligendi molestias laborum iste in sunt eius similique.</div>
                    <a href="#" class="carrocel--slider--content__btn">Ver mais</a>
                </div>
            </div>
            <div class="carrocel--slider__slide" style="background-image: url(assets/images/image6.jpg);">
                <div class="carrocel--slider--content">
                    <div class="product__name">Monitor LG</div>
                    <div class="product__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, illo. Nihil qui eligendi molestias laborum iste in sunt eius similique.</div>
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
                <img src="assets/images/image3.jpg" alt="categories" />
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
                <img src="assets/images/pc.webp" alt="categories" />
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
                <img src="assets/images/cat-2.jpg" alt="categories" />
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
                <img src="assets/images/image2.jpg" alt="categories" />
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
                <img src="assets/images/product-1.jpg" alt="categories" />
            </div>
            <a href="#">
                <p class="categories--category__text">
                    <span>Relógios</span>
                    <span>100 produtos</span>
                </p>
            </a> 
        </div>   
        <div class="categories--category">
            <div class="categories--category__image">
                <img src="assets/images/product-7.jpg" alt="categories" />
            </div>
            <a href="#">
                <p class="categories--category__text">
                    <span>Acessórios</span>
                    <span>100 produtos</span>
                </p>
            </a>
        </div>   
        <div class="categories--category">
            <div class="categories--category__image">
                <img src="assets/images/image4.jpg" alt="categories" />
            </div>
            <a href="#">
                <p class="categories--category__text">
                    <span>Teclados</span>
                    <span>100 produtos</span>
                </p>
            </a>
        </div>   
        <div class="categories--category">
            <div class="categories--category__image">
                <img src="assets/images/jan-bottinger--kChshW17rw-unsplash.jpg" alt="categories" />
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
        <?php foreach($products as $product): ?>
            <div class="products--product">
                <div class="products--product__image">
                    <img src="<?= $product->image ?>" alt="product" />
                </div>
                <a class="products--product__name" href="#"><?= $product->name ?></a>
                <p class="products--product__price">
                    <span class="products--product__priceActual">Kz <?= number_format($product->price, 2, ',', '.') ?></span> 
                    <span class="products--product__pricePrev">Kz <?= number_format(($product->price - 1000), 2, ',', '.') ?></span>
                </p>
                <a class="products--product__add" href="#">Add no carrinho</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<!-- end products --> 

<?php $this->start('js') ?>
<script src="assets/js/carrocel.js"></script>
<?php $this->stop() ?>