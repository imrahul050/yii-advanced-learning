<?php
namespace common\traits;

use yii\web\UploadedFile;
use Yii;

trait UploadFileTrait
{
    public function uploadFile($model, $attribute, string $folder = 'uploads')
    {
        $file = UploadedFile::getInstance($model, $attribute);
        if (!$file) {
            return null;
        }

        $uploadPath = Yii::getAlias('@webroot/uploads/' . $folder);
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 755, true);
        }

        $fileName = time() . '_' . uniqid() . '.' . $file->extension;

        if ($file->saveAs($uploadPath . '/' . $fileName)) {
            return $fileName;
        }
        return null;
    }
}
