<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SdPc2machine]].
 *
 * @see SdPc2machine
 */
class SQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SdPc2machine[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdPc2machine|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
