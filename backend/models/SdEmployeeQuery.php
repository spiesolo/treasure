<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SdEmployee]].
 *
 * @see SdEmployee
 */
class SdEmployeeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SdEmployee[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdEmployee|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
