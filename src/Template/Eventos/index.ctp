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

    <!--<div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Draggable Events</h4>
            </div>
            <div class="box-body">
              the events 
              <div id="external-events">
                <div class="external-event bg-green">Lunch</div>
                <div class="external-event bg-yellow">Go home</div>
                <div class="external-event bg-aqua">Do homework</div>
                <div class="external-event bg-light-blue">Work on UI design</div>
                <div class="external-event bg-red">Sleep tight</div>
                <div class="checkbox">
                  <label for="drop-remove">
                    <input type="checkbox" id="drop-remove">
                    remove after drop
                  </label>
                </div>
              </div>
            </div>
            /.box-body
          </div>
           /. box 
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Create Event</h3>
            </div>
            <div class="box-body">
              <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                <button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>
                <ul class="fc-color-picker" id="color-chooser">
                  <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                  <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                </ul>
              </div>
              <!-- /btn-group 
              <div class="input-group">
                <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                <div class="input-group-btn">
                  <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Add</button>
                </div>
                <!-- /btn-group 
              </div>
              <!-- /input-group 
            </div>
          </div>
        </div>-->

        <!-- /.col -->
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
                <h3 class="modal-title">Marcar Consulta</h3>
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
      //'AdminLTE./plugins/fullcalendar/fullcalendar.min',

      'fullcalendar.min.js',
      'eventos.js',
      'pt-br.js',
    ],
    ['block' => 'script']);
    ?>

