<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Article $article
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
    </ul>
</nav>
<div class="articles view large-9 medium-8 columns content">
    <h3><?= h($article->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($article->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($article->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prority') ?></th>
            <td><?= h($article->prority) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td>
                <?= $this->Html->link($oAuthor->name, ['controller' => 'Users', 'action' => 'view', $article->author_id]); ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('Perfomer') ?></th>
            <td>
                <?= $this->Html->link($oPerfomer->name, ['controller' => 'Users', 'action' => 'view', $article->author_id]); ?>
            </td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($article->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($article->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($article->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($article->body)); ?>
    </div>
    <div class="row">
        <h4><?= __('Perfomer Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($article->perfomer_comment)); ?>
    </div>
</div>
