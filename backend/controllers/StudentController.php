<?php

namespace backend\controllers;

use common\models\Student;
use Yii;
use common\traits\UploadFileTrait;
use yii\data\Pagination;

class StudentController extends \yii\web\Controller
{
    use UploadFileTrait;
    // public function actionIndex()
    // {
    //     $students = Student::find()->all();
    //     // dd($students);
    //     return $this->render('index', ['students' => $students]);
    // }

    

public function actionIndex()
{
    $query = Student::find();

    $pagination = new Pagination([
        'totalCount' => $query->count(),
        'pageSize' => 2,
    ]);

    $students = $query
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

    return $this->render('index', [
        'students' => $students,
        'pagination' => $pagination,
    ]);
}


    public function actionCreate1()
    {

        $student = new Student();
        return $this->render('create', ['student' => $student]);
    }

    public function actionCreate()
    {

        // if( Yii::$app->request->isPost){
        //    dd(Yii::$app->request->post());
        // }

        $student = new Student();

        if ($student->load(Yii::$app->request->post())) {

            $student->imageFile = \yii\web\UploadedFile::getInstance(
                $student,
                'imageFile'
            );

            if ($student->validate()) {

                $fileName = $this->uploadFile(
                    $student,
                    'imageFile',
                    'students'
                );

                if ($fileName !== false && $fileName !== null) {
                    $student->profile = $fileName;
                }

                if ($student->save(false)) {

                    Yii::$app->session->setFlash(
                        'success',
                        'Student created successfully.'
                    );

                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('create', [
            'student' => $student
        ]);
    }

    public function actionUpdate($id)
    {
        $student = Student::findOne($id);

        if (!$student) {
            throw new \yii\web\NotFoundHttpException('Student not found.');
        }

        if ($student->load(Yii::$app->request->post())) {

            $student->imageFile = \yii\web\UploadedFile::getInstance(
                $student,
                'imageFile'
            );

            if ($student->validate()) {

                // Upload new image only if user selected one
                if ($student->imageFile) {

                    $fileName = $this->uploadFile(
                        $student,
                        'imageFile',
                        'students'
                    );

                    if ($fileName === false) {
                        $student->addError(
                            'imageFile',
                            'Unable to upload image.'
                        );
                    } else {
                        $student->profile = $fileName;
                    }
                }

                if (!$student->hasErrors() && $student->save(false)) {

                    Yii::$app->session->setFlash(
                        'success',
                        'Student updated successfully.'
                    );

                    return $this->redirect(['index']);
                }
            }
        }

        return $this->render('update', [
            'student' => $student,
        ]);
    }

    public function actionDelete($id)
    {
        $student = Student::findOne($id);

        if (!$student) {
            throw new \yii\web\NotFoundHttpException('Student not found.');
        }

        if ($student->delete()) {

            Yii::$app->session->setFlash(
                'success',
                'Student deleted successfully.'
            );
        } else {

            Yii::$app->session->setFlash(
                'error',
                'Unable to delete student.'
            );
        }

        return $this->redirect(['index']);
    }

}
