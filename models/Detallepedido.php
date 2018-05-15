<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%detallepedido}}".
 *
 * @property int $id
 * @property int $cantidad
 * @property double $precio
 * @property int $pedidoid
 * @property int $productoid
 *
 * @property Pedido $pedido
 * @property Producto $producto
 */
class Detallepedido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%detallepedido}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cantidad', 'precio', 'pedidoid', 'productoid'], 'required'],
            [['cantidad', 'pedidoid', 'productoid'], 'integer'],
            [['precio'], 'number'],
            [['pedidoid'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['pedidoid' => 'id']],
            [['productoid'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['productoid' => 'id']],
            [['cantidad','precio'], 'number', 'min'=>1],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'precio' => Yii::t('app', 'Precio'),
            'pedidoid' => Yii::t('app', 'Pedidoid'),
            'productoid' => Yii::t('app', 'Productoid'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedido::className(), ['id' => 'pedidoid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['id' => 'productoid']);
    }
}
