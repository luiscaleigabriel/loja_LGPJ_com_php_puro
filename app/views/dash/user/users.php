<?php $this->start('style') ?>
<link rel="stylesheet" href="assets/css/dashformtable.css" />
<?php $this->stop() ?>

<?= $this->layout('dash/master') ?>

<?php $this->insert('dash/partials/header') ?>

<div class="dash--title">
    <h2 class="dash__title">Usuários</h2>
    <a href="/dashcrateusers" class="btn btn-primary">Novo usuário</a>
</div>

<div class="table--group">
    <div class="table--top">
        <div class="search--form">
            <form class="form--search" action="">
                <input type="search" name="search" id="search" placeholder="Buscar por..." /> <button><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Género</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Fulano</td>
                    <td>fulano@gmail.com</td>
                    <td>99999999</td>
                    <td>Masculino</td>
                    <td>
                        <svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </td>
                    <td>
                        <a href="#" class="info-svg">
                        <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                        </svg>
                        </a>
                        <a href="#" class="text-danger w-4 h-4 mr-1">
                        <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        </a>
                    </td>
                </tr>
            </tbody>
    </table>
    <div class="table--button">
        <ul class="pagination">
            <li class="pagination__item">
                <a href="#"><<</a>
            </li>
            <li class="pagination__item">
                <a href="#">1</a>
            </li>
            <li class="pagination__item">
                <a href="#">2</a>
            </li>
            <li class="pagination__item">
                <a href="#">3</a>
            </li>
            <li class="pagination__item">
                <a href="#">>></a>
            </li>
        </ul>
    </div>
</div>