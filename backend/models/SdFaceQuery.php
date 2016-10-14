<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SdFace]].
 *
 * @see SdFace
 */
class SdFaceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SdFace[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdFace|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
