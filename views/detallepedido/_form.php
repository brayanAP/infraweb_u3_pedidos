<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Detallepedido */
/* @var $form yii\widgets\ActiveForm */

$this->registerJS(
    '$("document").ready(function(){
            $("#nuevo_detallepedido").on("pjax:end",function(){
                $.pjax.reload({container:"#detallepedidos"});
            });
        });'
);
?>



<div class="detallepedido-form">
    <?php Pjax::begin(['id' => 'nuevo_detallepedido'])?>

    <?php
    foreach (Yii::$app->session->getAllFlashes() as $key => $message){
        echo '<div class="alert alert-"'.$key.'>'.$message.'</div>';
    }
    ?>

    <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true]]); ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'precio')->textInput() ?>

    <?=
    $form->field($model, 'pedidoid')
        ->dropDownList(
            ArrayHelper::map(\app\models\Pedido::find()->asArray()->all(), 'id', 'id'),['prompt'=>'Select Option']
        )
    ?>

    <?=
    $form->field($model, 'productoid')
        ->dropDownList(
            ArrayHelper::map(\app\models\Producto::find()->asArray()->all(), 'id', 'nombrep'),['prompt'=>'Select Option']
        )
    ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php Pjax::end();?>

</div>
