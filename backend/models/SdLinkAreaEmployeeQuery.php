<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SdLinkAreaEmployee]].
 *
 * @see SdLinkAreaEmployee
 */
class SdLinkAreaEmployeeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SdLinkAreaEmployee[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdLinkAreaEmployee|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
