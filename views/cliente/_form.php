<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */

$this->registerJS(
        '$("document").ready(function(){
            $("#nuevo_cliente").on("pjax:end",function(){
                $.pjax.reload({container:"#clientes"});
            });
        });'
);
?>

<div class="cliente-form">

    <?php Pjax::begin(['id' => 'nuevo_cliente'])?>

    <?php
foreach (Yii::$app->session->getAllFlashes() as $key => $message){
    echo '<div class="alert alert-"'.$key.'>'.$message.'</div>';
}
    ?>

    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true]]); ?>

    <?= $form->field($model, 'rfc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'razonsocial')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php Pjax::end();?>

</div>
