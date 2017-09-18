<?php
/**
  * @var \App\View\AppView $this
  */

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $article->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
    </ul>
</nav>
<div class="articles form large-9 medium-8 columns content">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <legend><?= __('Edit Article') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('body');
            echo $this->Form->control('perfomer_comment');
            echo $this->Form->control('prority', ['options' => ['low'=>'low', 'normal'=>'normal', 'urgent'=>'urgent']]);
            echo $this->Form->control('perfomer_id', ['options' => $usersModel->find('list')]);
            echo $this->Form->control('state', ['options' => ['created'=>'created', 'in_work'=>'in_work', 'done'=>'done', 'rejected'=>'rejected']]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
