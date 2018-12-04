<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Consulta $consulta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $consulta->id_consulta],
                ['confirm' => __('Are you sure you want to delete # {0}?', $consulta->id_consulta)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Consultas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Atendentes'), ['controller' => 'Atendentes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Atendente'), ['controller' => 'Atendentes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Procedimentos'), ['controller' => 'Procedimentos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Procedimento'), ['controller' => 'Procedimentos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="consultas form large-9 medium-8 columns content">
    <?= $this->Form->create($consulta) ?>
    <fieldset>
        <legend><?= __('Edit Consulta') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('start', ['empty' => true]);
            echo $this->Form->control('end', ['empty' => true]);
            echo $this->Form->control('atendente_id', ['options' => $atendentes, 'empty' => true]);
            echo $this->Form->control('cliente_id', ['options' => $clientes, 'empty' => true]);
            echo $this->Form->control('procedimento_id', ['options' => $procedimentos, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
