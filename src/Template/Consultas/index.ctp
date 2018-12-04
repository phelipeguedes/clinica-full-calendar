<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Consulta[]|\Cake\Collection\CollectionInterface $consultas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Consulta'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Atendentes'), ['controller' => 'Atendentes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Atendente'), ['controller' => 'Atendentes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Procedimentos'), ['controller' => 'Procedimentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Procedimento'), ['controller' => 'Procedimentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="consultas index large-9 medium-8 columns content">
    <h3><?= __('Consultas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_consulta') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end') ?></th>
                <th scope="col"><?= $this->Paginator->sort('atendente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('procedimento_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($consultas as $consulta): ?>
            <tr>
                <td><?= $this->Number->format($consulta->id_consulta) ?></td>
                <td><?= h($consulta->title) ?></td>
                <td><?= h($consulta->start) ?></td>
                <td><?= h($consulta->end) ?></td>
                <td><?= $consulta->has('atendente') ? $this->Html->link($consulta->atendente->id_atendente, ['controller' => 'Atendentes', 'action' => 'view', $consulta->atendente->id_atendente]) : '' ?></td>
                <td><?= $consulta->has('cliente') ? $this->Html->link($consulta->cliente->id_cliente, ['controller' => 'Clientes', 'action' => 'view', $consulta->cliente->id_cliente]) : '' ?></td>
                <td><?= $consulta->has('procedimento') ? $this->Html->link($consulta->procedimento->id_procedimento, ['controller' => 'Procedimentos', 'action' => 'view', $consulta->procedimento->id_procedimento]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $consulta->id_consulta]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $consulta->id_consulta]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $consulta->id_consulta], ['confirm' => __('Are you sure you want to delete # {0}?', $consulta->id_consulta)]) ?>
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
