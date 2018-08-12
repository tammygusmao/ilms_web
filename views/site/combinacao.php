<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Busca combinada de solução';
$this->params['breadcrumbs'][] = $this->title;
?>

<div>
    <h1><?= Html::encode($this->title) ?></h1>
    
      <div class="col-xs-6 col-md-10"> 
      <br>
        <?php $form = ActiveForm::begin(); ?>

                <fieldset>
                        <legend>Opções de combinação</legend> 

                        <?= $form->field($model, 'cbr')->radio() ?>
                        <?= $form->field($model, 'ava')->radio() ?>
                        <?= $form->field($model, 'esp')->radio() ?>

                </fieldset>

                <?= $form->field($model, 'palavras_chaves')->textInput(['maxlength' => true]) ?>
                
                <?= $form->field($model, 'tipo_problema')->dropDownList([$arrayTiposProblemas],['style' => 'width:500px',
                                                      'prompt' => "Selecione um tipo de problema",]); ?> 
                
                <?= $form->field($model, 'titulo_problema')->dropDownList([$arrayTitulosProblemas],['style' => 'width:500px',
                                                      'prompt' => "Selecione um título de problema",]); ?> 
<br><br> 

          <div class="form-group">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
          </div>

        <?php ActiveForm::end(); ?>

      </div>
        <!--</div>-->

</div>
