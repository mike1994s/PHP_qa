<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller {

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }
 
    

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionLegal() {
        $model = new \app\models\LegalForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->session->setFlash('contactFormSubmitted');
         
            return $this->render('success');
        }
        return $this->render('legal', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionIndividual() {
        $model = new \app\models\IndividualForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->session->setFlash('contactFormSubmitted');
    
              return $this->render('success');
        }
        return $this->render('individual', [
                    'model' => $model,
        ]);
    }

}
