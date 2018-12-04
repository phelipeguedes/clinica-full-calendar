<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Consulta $consulta
 */
?>

<?php
        echo $this->Html->css('add_consultas.css');
?>


<section class="content-header">
  <h1>
    Agendar Consultas
    <small>Calendário</small>
</h1>
<ol class="breadcrumb">
    <li><a href="/clientes"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active">Calendário</li>
</ol>
</section>

<section class="content">
  <div class="row">

    <div class="col-md-12">
        <!-- exibe os detalhes da consulta -->
        <div class="alert" role="alert">
              <button type="button" class="close" aria-label="Close" data-hide="alert"><span aria-hidden="true">&times;</span></button>
              <!-- botão editar consulta -->
              <button type="button" class="btn btn-primary btn-md" id="btn_edit">Editar</button>

              <h4 class="alert-heading">Detalhes da Consulta</h4>
              <hr>
              <p class="mb-0" id="descricao_consulta"></p>
              <p class="mb-0" id="horario_inicio"></p>
        </div>

        <div class="form-group">
            <label for="ver_agendas">Ver Agendas</label>
            <?php echo $this->Form->input('atendente_id', ['label' => false, 'class' => 'form-control', 'id' => 'ver_agendas', 'empty' => array(0 => ' Todas as agendas')]);
            ?>
        </div>

        <div class="box box-primary">
            <div class="box-body no-padding">
                <!-- calendário -->
                <div id="calendar"></div>
            </div>
        </div>
    </div>

    <!-- modal add consulta -->
    <div class="modal" tabindex="-1" role="dialog" id="modal_add">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title">Marcar Consulta</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
             </div>

            <div class="modal-body">

                <?= $this->Form->create($consulta) ?>

                    <div class="form-group">
                        <label for="nome">Atendentes</label>
                        <?php echo $this->Form->input('atendente_id', ['options' => $atendentes, 'label' => false, 'class' => 'form-control', 'empty' => 'Selecione um especialista', 'required']) ?>
                    </div>

                    <div class="form-group">
                        <label for="nome">Clientes</label>
                        <?php echo $this->Form->input('cliente_id', ['options' => $clientes, 'label' => false, 'class' => 'form-control', 'empty' => 'Selecione o(a) cliente', 'required']) ?>
                    </div>

                    <div class="form-group">
                        <label for="email">Procedimento</label>
                        <?php echo $this->Form->input('procedimento_id', ['options' => $procedimentos, 'label' => false, 'class' => 'form-control', 'empty' => 'Selecione o procedimento', 'required']) ?>
                    </div>

                    <div class="form-group">
                        <label for="start">Início</label>
                        <?php echo $this->Form->control('start', ['type' => 'text', 'id' => 'start', 'label' => false, 'class' => 'form-control data', 'empty' => true, 'required', 'maxlength' => '16', 'placeholder' => 'Digite apenas números']); ?>
                        <small id="emailHelp" class="form-text text-primary">Data e hora devem ter o seguinte formato: DD/MM/AAAA HH:MM</small>
                    </div>

                    <div class="form-group">
                        <label for="end">Fim</label>
                        <?php echo $this->Form->control('end', ['type' => 'text', 'id' => 'end', 'label' => false, 'class' => 'form-control data', 'empty' => true, 'required', 'maxlength' => '16', 'placeholder' => 'Digite apenas números', ]); ?>
                        <small id="emailHelp" class="form-text text-primary">Data e hora devem ter o seguinte formato: DD/MM/AAAA HH:MM</small>
                    </div>

                    <div class="form-group">
                        <label for="title">Descrição da Consulta</label>
                        <?php echo $this->Form->control('title', ['type' => 'text', 'id' => 'title', 'label' => false, 'class' => 'form-control', 'placeholder' => 'Informe um título/identificação para a consulta', 'required']); ?>
                    </div>

            </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn_modal" data-dismiss="modal">CANCELAR</button>
                    <button type="submit" id="btn_salvar" class="btn btn-primary btn_modal">CONFIRMAR CONSULTA</button>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div> <!-- modal add -->

    <!-- modal edit consulta -->
    <div class="modal" tabindex="-1" role="dialog" id="modal_edit">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title">Alterar Consulta</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
             </div>

            <div class="modal-body">
                <!-- como este é o ctp do 'add', a model do form foi setada como 'false' e a URL foi modificada pra action não apontar pro método 'add'   -->
                <?= $this->Form->create(false, ['id' => 'form_edit', 'url' => '/consultas/edit']) ?>
                    <?php echo $this->Form->hidden('id', ['id' => 'id_consulta_edit']); ?>

                    <div class="form-group">
                        <label for="nome">Atendente</label>
                        <?php echo $this->Form->input('atendente_id_edit', ['options' => $atendentes, 'id' => 'atendente_edit', 'label' => false, 'class' => 'form-control', 'empty' => 'Selecione um especialista', 'required']) ?>
                    </div>

                    <div class="form-group">
                        <label for="nome">Cliente</label>
                        <?php echo $this->Form->input('cliente_id_edit', ['options' => $clientes, 'id' => 'cliente_edit', 'label' => false, 'class' => 'form-control', 'empty' => 'Selecione o(a) cliente', 'required']) ?>
                    </div>

                    <div class="form-group">
                        <label for="email">Procedimento</label>
                        <?php echo $this->Form->input('procedimento_id_edit', ['options' => $procedimentos, 'id' => 'procedimento_edit', 'label' => false, 'class' => 'form-control', 'empty' => 'Selecione o procedimento', 'required']) ?>
                    </div>

                    <div class="form-group">
                        <label for="start">Início</label>
                        <?php echo $this->Form->input('start_edit', ['type' => 'text', 'id' => 'horario_inicio_edit', 'label' => false, 'class' => 'form-control data', 'empty' => true, 'required', 'maxlength' => '16', 'Digite apenas números']); ?>
                            <small id="emailHelp" class="form-text text-primary">Data e hora devem ter o seguinte formato: DD/MM/AAAA HH:MM</small>
                    </div>

                    <div class="form-group">
                        <label for="end">Fim</label>
                        <?php echo $this->Form->input('end_edit', ['type' => 'text', 'id' => 'horario_fim_edit', 'label' => false, 'class' => 'form-control data', 'empty' => true, 'required', 'maxlength' => '16', 'placeholder' => 'Digite apenas números']); ?>
                            <small id="emailHelp" class="form-text text-primary">Data e hora devem ter o seguinte formato: DD/MM/AAAA HH:MM</small>
                    </div>

                    <div class="form-group">
                        <label for="title">Descrição da Consulta</label>
                        <?php echo $this->Form->control('title_edit', ['type' => 'text', 'id' => 'title_edit', 'label' => false, 'class' => 'form-control', 'placeholder' => 'Informe um título (identificação) p/ a consulta', 'required']); ?>
                    </div>

            </div><!-- modal body -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn_modal" data-dismiss="modal">CANCELAR</button>
                    <button type="submit" id="btn_salvar_edit" class="btn btn-warning btn_modal">SALVAR ALTERAÇÃO</button>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div> <!--  modal edit -->


</div>
<!-- /.row -->
</section>

<?php
$this->Html->css('AdminLTE./plugins/fullcalendar/fullcalendar.min', ['block' => 'css']);
$this->Html->css('AdminLTE./plugins/fullcalendar/fullcalendar.print', ['block' => 'css', 'media' => 'print']);

$this->Html->script([

  // arquivos baixados, só não o jquery ui(esqueci)
  'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
  'moment.min.js',
  'fullcalendar.min.js',
  'pt-br.js',
  'consultas.js',

],
['block' => 'script']);
?>


