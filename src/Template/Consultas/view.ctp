<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Consulta $consulta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Consulta'), ['action' => 'edit', $consulta->id_consulta]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Consulta'), ['action' => 'delete', $consulta->id_consulta], ['confirm' => __('Are you sure you want to delete # {0}?', $consulta->id_consulta)]) ?> </li>
        <li><?= $this->Html->link(__('List Consultas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Consulta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Atendentes'), ['controller' => 'Atendentes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Atendente'), ['controller' => 'Atendentes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Procedimentos'), ['controller' => 'Procedimentos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Procedimento'), ['controller' => 'Procedimentos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="consultas view large-9 medium-8 columns content">
    <h3><?= h($consulta->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($consulta->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Atendente') ?></th>
            <td><?= $consulta->has('atendente') ? $this->Html->link($consulta->atendente->id_atendente, ['controller' => 'Atendentes', 'action' => 'view', $consulta->atendente->id_atendente]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $consulta->has('cliente') ? $this->Html->link($consulta->cliente->id_cliente, ['controller' => 'Clientes', 'action' => 'view', $consulta->cliente->id_cliente]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Procedimento') ?></th>
            <td><?= $consulta->has('procedimento') ? $this->Html->link($consulta->procedimento->id_procedimento, ['controller' => 'Procedimentos', 'action' => 'view', $consulta->procedimento->id_procedimento]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Consulta') ?></th>
            <td><?= $this->Number->format($consulta->id_consulta) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start') ?></th>
            <td><?= h($consulta->start) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End') ?></th>
            <td><?= h($consulta->end) ?></td>
        </tr>
    </table>
</div>
