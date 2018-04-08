<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
        <?= Html::a('Create Detallepedido', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
</div>
