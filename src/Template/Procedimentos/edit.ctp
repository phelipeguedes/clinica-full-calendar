<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Procedimento $procedimento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $procedimento->id_procedimento],
                ['confirm' => __('Are you sure you want to delete # {0}?', $procedimento->id_procedimento)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Procedimentos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Atendentes'), ['controller' => 'Atendentes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Atendente'), ['controller' => 'Atendentes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="procedimentos form large-9 medium-8 columns content">
    <?= $this->Form->create($procedimento) ?>
    <fieldset>
        <legend><?= __('Edit Procedimento') ?></legend>
        <?php
            echo $this->Form->control('descricao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
