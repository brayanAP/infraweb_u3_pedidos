<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "{{%producto}}".
 *
 * @property int $id
 * @property string $nombrep
 * @property double $preciosugerido
 *
 * @property Detallepedido[] $detallepedidos
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%producto}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombrep', 'preciosugerido'], 'required'],
            [['preciosugerido'], 'number'],
            [['nombrep'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombrep' => Yii::t('app', 'Nombrep'),
            'preciosugerido' => Yii::t('app', 'Preciosugerido'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallepedidos()
    {
        return $this->hasMany(Detallepedido::className(), ['productoid' => 'id']);
    }
}
