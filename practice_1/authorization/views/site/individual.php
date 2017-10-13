<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm; 

$this->title = 'Физическое лицо';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
 
 

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'individual-form']); ?>

                    <?= $form->field($model, 'fio')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'inn') ?>


                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'individual-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div> 
</div>
