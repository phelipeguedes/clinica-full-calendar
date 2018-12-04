<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Atendente $atendente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $atendente->id_atendente],
                ['confirm' => __('Are you sure you want to delete # {0}?', $atendente->id_atendente)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Atendentes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="atendentes form large-9 medium-8 columns content">
    <?= $this->Form->create($atendente) ?>
    <fieldset>
        <legend><?= __('Edit Atendente') ?></legend>
        <?php
            echo $this->Form->control('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
