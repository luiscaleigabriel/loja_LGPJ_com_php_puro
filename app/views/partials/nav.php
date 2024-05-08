<div class="header--top">
    <div class="header--top--c wrapper">
        <div class="header--logo">
            <a href="/">
                <h1>Loja<span class="header--logo__span">LGPJ</span></h1>
            </a>
        </div>
        <div class="header--search">
        <?= $instances['session']::has('logged') ? 'Olá! '. mb_strtoupper($instances['session']::get('user')['name']) . ' <i class="fa fa-user"></i> ' : '' ?>
            <form action="">
                <label for="search">
                    <input type="search" name="search" id="search" placeholder="Busque por produtos" /> 
                    <i class="fa fa-search"></i>
                </label>
            </form>
            <?= $instances['session']::has('logged') ? '<a href="/acount">Minha conta <i class="fa fa-user-circle"></i></a>' : '' ?>
        </div>
    </div>
</div> <!-- header-top -->
<div class="header--bottom">
    <nav class="nav--dropdown wrapper">
        <ul class="nav--dropdown--list">
            <li class="nav--dropdown--list__item">
                <button class="nav--dropdown--list__btn">Electrónicos</button>
                <ul class="nav--dropdown--menu">
                    <li class="nav--dropdown--menu__item">
                        <a href="#">Celulares</a>
                    </li>
                    <li class="nav--dropdown--menu__item">
                        <a href="#">Tabletes</a>
                    </li>
                    <li class="nav--dropdown--menu__item">
                        <a href="#">Computadores</a>
                    </li>
                    <li class="nav--dropdown--menu__item">
                        <a href="#">Micrô-fone</a>
                    </li>
                    <li class="nav--dropdown--menu__item">
                        <a  href="#">Watches</a>
                    </li>
                </ul>
            </li>
            <li class="nav--dropdown--list__item">
                <button class="nav--dropdown--list__btn">Electrodomésticos</button>
                <ul class="nav--dropdown--menu">
                    <li class="nav--dropdown--menu__item">
                        <a href="#">TVs</a>
                    </li>
                    <li class="nav--dropdown--menu__item">
                        <a href="#">Máquinas de Lavar</a>
                    </li>
                    <li class="nav--dropdown--menu__item">
                        <a href="#">Ar condicionado</a>
                    </li>
                </ul>
            </li>
        </ul>
        <a href="/cart" class="header--cartLink">
            <i class="fa fa-cart-shopping"></i>
            <span class="header--cartLink__quantity" ><?= count($instances['cart']->getCart()) ?></span>
        </a>
    </nav>
</div>
<!-- start header mobile -->
<div class="header--mobile">
    <div class="header--logo">
        <a href="#">
            <h1>Loja<span class="header--logo__span">LGPJ</span></h1>
        </a>
    </div>
    <a href="/cart" class="header--cartLink">
        <i class="fa fa-cart-shopping"></i>
        <span class="header--cartLink__quantity" ><?= count($instances['cart']->getCart()) ?></span>
    </a>
    <button id="toggle">
        <span class="row"></span>
        <span class="row"></span>
        <span class="row"></span>
    </button>
</div>
<nav id="nav--mobile" class="nav--mobile">
    <ul class="nav--mobile--list">
        <li class="nav-mobile--list__item">
            <button class="nav-mobile--list__btn">Electrónicos</button>
            <ul class="nav--mobile--sublist">
                <li class="nav--mobile--sublist__item">
                    <a onclick="openCloseMobile()" href="#">Celulares</a>
                </li>
                <li class="nav--mobile--sublist__item">
                    <a onclick="openCloseMobile()" href="#">Tabletes</a>
                </li>
                <li class="nav--mobile--sublist__item">
                    <a onclick="openCloseMobile()" href="#">Computadores</a>
                </li>
                <li class="nav--mobile--sublist__item">
                    <a onclick="openCloseMobile()" href="#">Micrô-fone</a>
                </li>
                <li class="nav--mobile--sublist__item">
                    <a onclick="openCloseMobile()" href="#">Watches</a>
                </li>
            </ul>
        </li>
        <li class="nav-mobile--list__item">
            <button class="nav-mobile--list__btn">Electrodomésticos</button>
            <ul class="nav--mobile--sublist">
                <li class="nav--mobile--sublist__item">
                    <a onclick="openCloseMobile()" href="#">TVs</a>
                </li>
                <li class="nav--mobile--sublist__item">
                    <a onclick="openCloseMobile()" href="#">Máquinas de Lavar</a>
                </li>
                <li class="nav--mobile--sublist__item">
                    <a onclick="openCloseMobile()" href="#">Ar condicionado</a>
                </li>
            </ul>
        </li>
        <li class="nav-mobile--list__item">
            <a class="nav-mobile--list__link" href="/login">Minha conta</a>
        </li>
    </ul>
</nav>
<!-- end header mobile -->