<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use nex\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */
/* @var $form yii\widgets\ActiveForm */
$this->registerJS(
    '$("document").ready(function(){
            $("#nuevo_pedido").on("pjax:end",function(){
                $.pjax.reload({container:"#pedidos"});
            });
        });'
);
?>

<div class="pedido-form">

    <?php Pjax::begin(['id' => 'nuevo_pedido'])?>

    <?php
    foreach (Yii::$app->session->getAllFlashes() as $key => $message){
        echo '<div class="alert alert-"'.$key.'>'.$message.'</div>';
    }
    ?>

    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true]]); ?>


    <?= DatePicker::widget([
        'model' => $model,
        'attribute' => 'fecha',
        'language' => 'en',
        'size' => 'lg',
        'readonly' => true,
        'placeholder' => 'Choose date',
        'clientOptions' => [
            'format' => 'YYYY-MM-DD',
            'minDate' => '2018-05-15',
            'maxDate' => '2020-05-15'
        ]
    ]);?>

    <div style="margin: 20px"></div>

    <?=
    $form->field($model, 'clienteid')
        ->dropDownList(
            ArrayHelper::map(\app\models\Cliente::find()->asArray()->all(), 'id', 'razonsocial'),['prompt'=>'Select Option']
        )
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php Pjax::end();?>

</div>
