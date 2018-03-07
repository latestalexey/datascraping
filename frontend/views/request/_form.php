<?php
  use yii\widgets\ActiveForm;
  use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin([
  'id' => 'login-form',
]); ?>
    

    <h3>Информация о проекте</h3>
    <hr>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputEmail4">Проект</label>
      </div>
      <div class="col-md-8">
        <?= $form->field($model,'project_name')->textInput(); ?>
      </div>
    </div>
    <hr>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputEmail4">Источник</label>
      </div>
      <div class="col-md-8">
        <?= $form->field($model,'websites')->textArea(); ?>
      </div>
    </div>
    <hr>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputEmail4">Что парсить?</label>
      </div>
      <div class="col-md-8">
        <?= $form->field($model,'type')->dropDownList($model->typeList); ?>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
      </div>
      <div class="col-md-8">
        <?= $form->field($model,'extraction_fields')->textArea(); ?>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
      </div>
      <div class="col-md-8">
        <?= $form->field($model,'records')->textInput(); ?>
      </div>
    </div>
    <hr>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputEmail4">Когда парсить?</label>
      </div>
      <div class="col-md-8">
        <?= $form->field($model,'frequency')->dropDownList($model->frequencyList); ?>
      </div>
    </div>
    <hr>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputEmail4">Дополнительная информация</label>
      </div>
      <div class="col-md-8">
        <?= $form->field($model,'attachment')->fileInput(); ?>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
      </div>
      <div class="col-md-8">
        <?= $form->field($model,'description')->textArea(); ?>
      </div>
    </div>
    <hr>





    <h3 class="topmargin">Контактная информация</h3>
    <div class="form-row">
      <div class="col-md-6">
        <?= $form->field($model,'first_name')->textInput(); ?>
      </div>      
      <div class="col-md-6">
        <?= $form->field($model,'last_name')->textInput(); ?>
      </div> 
    </div>
    <div class="form-row">
      <div class="col-md-6">
        <?= $form->field($model,'email')->textInput(); ?>
      </div> 
      <div class="col-md-6">
        <?= $form->field($model,'phone')->textInput(); ?>
      </div> 
    </div>

    <div class="form-row">
      <div class="col-md-6">
        <?= $form->field($model,'company_name')->textInput(); ?>
      </div>
      <div class="col-md-6">
        <?= $form->field($model,'job_title')->textInput(); ?>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-6">
        <?= $form->field($model,'region_id')->dropDownList($model->regionList,[
          'class'=>'form-control',
          'onchange'=>'
              $.post( "'.Yii::$app->urlManager->createUrl('/location/city-lists?id=').'"+$(this).val(), function( data ) {
                $( "#request-location_id" ).html( data );
              });
          '
          ]); ?>
      </div>
      <div class="col-md-6">
        <?= $form->field($model,'location_id')->dropDownList($model->cityList); ?>
      </div>
    </div>


    <div class="alignright">
      <button type="submit" class="btn btn-success">Отправить заявку</button>  
    </div>
    
<?php ActiveForm::end(); ?>