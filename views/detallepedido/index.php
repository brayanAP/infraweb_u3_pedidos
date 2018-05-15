<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use app\models\Detallepedido;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetallepedidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detallepedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallepedido-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
        Modal::begin([
            'header' => '<h2>Crear Detalle Pedido</h2>',
            'toggleButton' => ['label' => 'Crear','class' => 'btn btn-success'],

        ]);
        echo $this->render('/detallepedido/create',['model' => new Detallepedido()]);
        Modal::end();
        ?>
    </p>

    <?php Pjax::begin(['id' => 'detallepedidos']);?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cantidad',
            'precio',
            'pedidoid',
            'productoid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end();?>
</div>
