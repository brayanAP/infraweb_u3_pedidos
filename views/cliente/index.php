<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use app\models\Cliente;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- MANDAR A LLAMAR EL MODAL-->
    <p>
        <?php
        Modal::begin([
                'header' => '<h2>Crear Cliente</h2>',
        'toggleButton' => ['label' => 'Crear','class' => 'btn btn-success'],

        ]);
        echo $this->render('/cliente/create',['model' => new Cliente()]);
        Modal::end();
        ?>
    </p>

    <?php Pjax::begin(['id' => 'clientes']);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'rfc',
            'razonsocial',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end();?>
</div>
