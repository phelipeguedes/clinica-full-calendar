<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Procedimento $procedimento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Procedimento'), ['action' => 'edit', $procedimento->id_procedimento]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Procedimento'), ['action' => 'delete', $procedimento->id_procedimento], ['confirm' => __('Are you sure you want to delete # {0}?', $procedimento->id_procedimento)]) ?> </li>
        <li><?= $this->Html->link(__('List Procedimentos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Procedimento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Atendentes'), ['controller' => 'Atendentes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Atendente'), ['controller' => 'Atendentes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="procedimentos view large-9 medium-8 columns content">
    <h3><?= h($procedimento->id_procedimento) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descricao') ?></th>
            <td><?= h($procedimento->descricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Procedimento') ?></th>
            <td><?= $this->Number->format($procedimento->id_procedimento) ?></td>
        </tr>
    </table>
</div>
