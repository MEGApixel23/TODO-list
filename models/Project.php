<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

/**
 * This is the model class for table "projects".
 *
 * @property integer $id
 * @property string $title
 * @property integer $user_id
 * @property string $timestamp_create
 * @property string $timestamp_update
 * @property integer $deleted
 * @property integer $priority
 *
 * @property Task[] $tasks
 */
class Project extends \yii\db\ActiveRecord implements Linkable
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'user_id'], 'required'],
            [['user_id', 'deleted', 'priority'], 'integer'],
            [['timestamp_create', 'timestamp_update'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'user_id' => 'User ID',
            'timestamp_create' => 'Timestamp Create',
            'timestamp_update' => 'Timestamp Update',
            'deleted' => 'Deleted',
            'priority' => 'Priority',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['project_id' => 'id'])->where([
            'deleted' => 0
        ]);
    }

    public function extraFields()
    {
        return ['tasks'];
    }

    /**
     * @inheritdoc
     * @return ActiveQuery the newly created [[ActiveQuery]] instance.
     */
    public static function find()
    {
        return parent::find()->andWhere(['deleted' => 0]);
    }

    public function beforeValidate()
    {
        if (!$this->user_id)
            $this->user_id = 0;

        return parent::beforeValidate();
    }

    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['project/view', 'id' => $this->id], true),
        ];
    }
}
