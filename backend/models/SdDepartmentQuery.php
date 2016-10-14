<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SdDepartment]].
 *
 * @see SdDepartment
 */
class SdDepartmentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SdDepartment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SdDepartment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
