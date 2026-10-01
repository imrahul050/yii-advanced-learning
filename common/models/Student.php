<?php
namespace common\models;

use yii\db\ActiveRecord;

class Student extends ActiveRecord
{
    public $imageFile;
    public static function tableName()
    {
        return 'students';
    }

    public function rules()
    {
        return [
            [['name', 'email','phone'], 'required'],

            ['name', 'string', 'max' => 255],

            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique'],

            ['phone', 'string', 'max' => 20],
            ['phone', 'unique'],

            ['status', 'integer'],

            [
                'imageFile',
                'file',
                'extensions' => ['png', 'jpg', 'jpeg', 'webp'],
                'maxSize' => 2 * 1024 * 1024,
                'skipOnEmpty' => true,
            ],
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($insert) {
            // Before INSERT
            $this->created_at = date('Y-m-d H:i:s');
        }

        // Before INSERT and UPDATE
        $this->updated_at = date('Y-m-d H:i:s');

        return true;
    }
}