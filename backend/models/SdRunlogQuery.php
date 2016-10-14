<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SdRunlog]].
 *
 * @see SdRunlog
 */
class SdRunlogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SdRunlog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdRunlog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
