<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%pedido}}".
 *
 * @property int $id
 * @property string $fecha
 * @property int $clienteid
 *
 * @property Cliente $cliente
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pedido}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'clienteid'], 'required'],
            [['fecha'], 'safe'],
            [['clienteid'], 'integer'],
            [['clienteid'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['clienteid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fecha' => Yii::t('app', 'Fecha'),
            'clienteid' => Yii::t('app', 'Clienteid'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'clienteid']);
    }
}
