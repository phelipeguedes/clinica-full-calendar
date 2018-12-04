<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Evento $evento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Eventos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="eventos form large-9 medium-8 columns content">
    <?= $this->Form->create($evento) ?>
    <fieldset>
        <legend><?= __('Add Evento') ?></legend>
        <?php
        echo $this->Form->control('title');
        echo $this->Form->control('start');
        echo $this->Form->control('end');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<!-- Content Header (Page header) -->

<?php 
echo $this->Html->css('link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"     integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous');
echo $this->Html->script('"https://code.jquery.com/jquery-3.3.1.min.js"');
?>

<section class="content-header">
  <h1>
    Aniversários
    <small>Calendário</small>
</h1>
<ol class="breadcrumb">
    <li><a href="/clientes"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active">Calendário</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">

     
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body no-padding">
          <!-- THE CALENDAR -->
          <div id="calendar"></div>
      </div>
      <!-- /.box-body -->
  </div>
  <!-- /. box -->
</div>
<!-- /.col -->

<div class="modal" tabindex="-1" role="dialog" id="cadastrar">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Marcar Procedimento</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <form id="form">
      
      <div class="form-group">
        <label for="nome">Atendentes</label>
        <?php echo $this->Form->input('atendente_id', ['options' => $atendentes, 'label' => false, 'class' => 'form-control', 'empty' => 'selecione um especialista']) ?>
    </div>
    
    <div class="form-group">
        <label for="nome">Clientes</label>
        <?php echo $this->Form->input('empresa_id', ['options' => $clientes, 'label' => false, 'class' => 'form-control', 'empty' => 'selecione o(a) cliente']) ?>
    </div>
    
    <div class="form-group">
        <label for="email">Procedimento</label>
        <?php echo $this->Form->input('procedimento_id', ['options' => $procedimentos, 'label' => false, 'class' => 'form-control', 'empty' => 'selecione o procedimento']) ?>
    </div>
    
    <div class="form-group">
        <label for="inicio">Inicio</label>
        <input type="datetime-local" class="form-control" id="inicio">
    </div>

    <div class="form-group">
        <label for="fim">Fim</label>
        <input type="datetime-local" class="form-control" id="fim">
    </div>
    
</form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" id="btn-salvar">Salvar</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
</div>
</div>
</div>
</div>

</div>
<!-- /.row -->
</section>
<!-- /.content -->

<?php
$this->Html->css('AdminLTE./plugins/fullcalendar/fullcalendar.min', ['block' => 'css']);
$this->Html->css('AdminLTE./plugins/fullcalendar/fullcalendar.print', ['block' => 'css', 'media' => 'print']);

$this->Html->script([

  'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
  'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js',
  'AdminLTE./plugins/fullcalendar/fullcalendar.min',

  'eventos.js',
],
['block' => 'script']);
?>


