<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SdMachine]].
 *
 * @see SdMachine
 */
class SdMachineQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SdMachine[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdMachine|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
