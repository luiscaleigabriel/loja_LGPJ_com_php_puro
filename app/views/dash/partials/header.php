<header class="header">
    <button class="toggle" id="toggle"><i class="fas fa-bars"></i></button>
    <div class="dropdown--user">
        <div class="dropdown--user__name"><?= $instances['session']::get('user')['name'] ?></div>
        <div class="dropdown--user__image">
            <?= $instances['session']::get('user')['image'] !== null ? $instances['session']::get('user')['image'] : '<img src="/assets/images/user/avatar.png" alt="user image" />' ?>
        </div>
    </div>
    <div class="dropdown">
        <div class="dropdown__name"><?= $instances['session']::get('user')['name'] ?></div>
        <div class="dropdown__email"><?= $instances['session']::get('user')['email'] ?></div>
        <div class="dropdown--options">
            <a href="#"> <i class="fas fa-lock mr-2"></i> Alterar senha</a>
            <a href="/logout"> <i class="fas fa-sign-out-alt mr-2"></i> Sair</a>
        </div>
    </div>
</header>