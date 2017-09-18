<h1>Вход</h1>
<?= $this->Form->create() ?>
<?= $this->Form->input('email') ?>
<?= $this->Form->input('password') ?>
<?= $this->Form->button('Войти') ?>
<?= $this->Form->end() ?>