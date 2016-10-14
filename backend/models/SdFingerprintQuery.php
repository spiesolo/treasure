<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SdFingerprint]].
 *
 * @see SdFingerprint
 */
class SdFingerprintQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SdFingerprint[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdFingerprint|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
