<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cliente}}".
 *
 * @property int $id
 * @property string $rfc
 * @property string $razonsocial
 *
 * @property Pedido[] $pedidos
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cliente}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rfc', 'razonsocial'], 'required'],
            [['rfc'], 'string', 'max' => 13],
            [['razonsocial'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'rfc' => Yii::t('app', 'Rfc'),
            'razonsocial' => Yii::t('app', 'Razonsocial'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['clienteid' => 'id']);
    }
}
