<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Article[]|\Cake\Collection\CollectionInterface $articles
  */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
    </ul>
</nav>
<div class="articles index large-9 medium-8 columns content">
    <h3><?= __('Articles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prority') ?></th>
                <th scope="col"><?= $this->Paginator->sort('author_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('perfomer_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): /*debug($article); exit;*/

//                $oAuthor = $usersModel->find()
//                    ->where(['id' => $article->author_id])
//                    ->first();
//
//                $oPerfomer = $usersModel->find()
//                    ->where(['id' => $article->perfomer_id])
//                    ->first();

//                debug($oAuthor->name);
            ?>
            <tr>
                <td><?= $this->Number->format($article->id) ?></td>
                <td><?= h($article->title) ?></td>
                <td><?= h($article->created) ?></td>
                <td><?= h($article->prority) ?></td>

                <td><?= $this->Html->link($article->author->name, ['controller' => 'Users', 'action' => 'view', $article->author_id]) ?></td>
                <td><?= $this->Html->link($article->perfomer->name, ['controller' => 'Users', 'action' => 'view', $article->perfomer_id]) ?></td>

                <!--<td>--><?php // echo $article->has('user') ? $this->Html->link($article->user->name, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : ''; ?><!--</td>-->

                <td><?= h($article->state) ?></td>
                <td><?= h($article->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $article->id]) ?>
                    <?php if(in_array($loggedUser['id'], [$article->perfomer_id, $article->author_id])):
                        echo $this->Html->link(__('Edit'), ['action' => 'edit', $article->id]);
                    endif; ?>
                    <?php if($loggedUser['id'] == $article->author_id):
                        echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]);
                    endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
