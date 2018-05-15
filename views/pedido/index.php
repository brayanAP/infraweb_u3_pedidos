<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use app\models\Pedido;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PedidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="pedido-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- MANDAR A LLAMAR EL MODAL-->
    <p>
        <?php
        Modal::begin([
            'header' => '<h2>Crear Pedido</h2>',
            'toggleButton' => ['label' => 'Crear','class' => 'btn btn-success'],

        ]);
        echo $this->render('/pedido/create',['model' => new Pedido()]);
        Modal::end();
        ?>
    </p>

    <?php Pjax::begin(['id' => 'pedidos']);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fecha',
            'clienteid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end();?>
</div>
