<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cliente'), ['action' => 'edit', $cliente->id_cliente]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cliente'), ['action' => 'delete', $cliente->id_cliente], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id_cliente)]) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Aniversarios'), ['controller' => 'Aniversarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aniversario'), ['controller' => 'Aniversarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clientes view large-9 medium-8 columns content">
    <h3><?= h($cliente->id_cliente) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($cliente->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Cliente') ?></th>
            <td><?= $this->Number->format($cliente->id_cliente) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Aniversarios') ?></h4>
        <?php if (!empty($cliente->aniversarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id Aniversario') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cliente->aniversarios as $aniversarios): ?>
            <tr>
                <td><?= h($aniversarios->id_aniversario) ?></td>
                <td><?= h($aniversarios->cliente_id) ?></td>
                <td><?= h($aniversarios->titulo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Aniversarios', 'action' => 'view', $aniversarios->id_aniversario]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Aniversarios', 'action' => 'edit', $aniversarios->id_aniversario]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Aniversarios', 'action' => 'delete', $aniversarios->id_aniversario], ['confirm' => __('Are you sure you want to delete # {0}?', $aniversarios->id_aniversario)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
