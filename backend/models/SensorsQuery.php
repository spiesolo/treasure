<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Sensors]].
 *
 * @see Sensors
 */
class SensorsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Sensors[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Sensors|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
