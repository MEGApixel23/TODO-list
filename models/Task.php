<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $user_id
 * @property string $text
 * @property string $timestamp_create
 * @property string $timestamp_update
 * @property integer $deleted
 * @property integer $priority
 * @property integer $done
 *
 * @property Project $project
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'user_id', 'text'], 'required'],
            [['project_id', 'user_id', 'deleted', 'priority', 'done'], 'integer'],
            [['text'], 'string'],
            [['timestamp_create', 'timestamp_update'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'user_id' => 'User ID',
            'text' => 'Text',
            'timestamp_create' => 'Timestamp Create',
            'timestamp_update' => 'Timestamp Update',
            'deleted' => 'Deleted',
            'priority' => 'Priority',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    public function beforeValidate()
    {
        if (!$this->user_id)
            $this->user_id = 0;

        return parent::beforeValidate();
    }
}
