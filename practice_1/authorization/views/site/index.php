<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Кем Вы являетесь?</h2>
                <button class="btn btn-success"><?= Html::a("Физическое лицо", "/index.php?r=site/individual" ) ?> </button>
                    <br/>
                    <div class="row">&nbsp;</div>
                <button class="btn btn-warning"><?= Html::a("Юридическое лицо", "/index.php?r=site/legal" ) ?>  </button>


            </div>
        </div>

    </div>
</div>
