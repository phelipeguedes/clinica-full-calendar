<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Atendente[]|\Cake\Collection\CollectionInterface $atendentes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Atendente'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="atendentes index large-9 medium-8 columns content">
    <h3><?= __('Atendentes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_atendente') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($atendentes as $atendente): ?>
            <tr>
                <td><?= $this->Number->format($atendente->id_atendente) ?></td>
                <td><?= h($atendente->nome) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $atendente->id_atendente]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $atendente->id_atendente]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $atendente->id_atendente], ['confirm' => __('Are you sure you want to delete # {0}?', $atendente->id_atendente)]) ?>
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
