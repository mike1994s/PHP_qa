<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Юридическое лицо';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
 
 

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'legal-form']); ?>

                    <?= $form->field($model, 'fio')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'inn') ?>
                    <?= $form->field($model, 'organizationName') ?>


                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'legal-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div> 
</div>
