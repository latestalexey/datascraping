<?php
  $class=[
    'success'=>'text-success',
    'error'=>'text-danger',
    'danger'=>'text-danger',
    'info'=> 'text-info',
    'warning'=>'text-warning'
  ];

  $icon=[
    'success'=>'icon-check',
    'error'=>'icon-times-circle',
    'danger'=>'icon-exclamation-triangle',
    'info'=> 'icon-info-circle',
    'warning'=>'icon-exclamation-triangle'
  ];

  $button=[
    'success'=>'btn-success',
    'error'=>'btn-danger',
    'danger'=>'btn-danger',
    'info'=> 'btn-info',
    'warning'=>'btn-warning'
  ];

  $title=[
    'success'=>'Ок',
    'error'=>'Ошибка',
    'danger'=>'Danger',
    'info'=> 'Info',
    'warning'=>'Warning'
  ]

  
?>
<div id="modalAlert" tabindex="-1" role="dialog" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">Close</span>
        </button>
        <h4 class="modal-title <?= $class[$type]; ?>"><?= $title[$type]; ?></h4>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <p><?= $message; ?></p>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn <?= $button[$type]; ?> pull-right" data-dismiss="modal" type="button">Продолжить</button>
      </div>
    </div>
  </div>
</div>