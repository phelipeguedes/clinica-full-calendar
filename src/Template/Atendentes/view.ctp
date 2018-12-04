<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Atendente $atendente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Atendente'), ['action' => 'edit', $atendente->id_atendente]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Atendente'), ['action' => 'delete', $atendente->id_atendente], ['confirm' => __('Are you sure you want to delete # {0}?', $atendente->id_atendente)]) ?> </li>
        <li><?= $this->Html->link(__('List Atendentes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Atendente'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="atendentes view large-9 medium-8 columns content">
    <h3><?= h($atendente->id_atendente) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($atendente->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Atendente') ?></th>
            <td><?= $this->Number->format($atendente->id_atendente) ?></td>
        </tr>
    </table>
</div>
