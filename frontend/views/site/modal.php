<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use frontend\models\TestModel;

$model = new TestModel();

Modal::begin([
    'header' => 'Test',
    'id' => 'modal',
    'size' => 'modal-lg',
]); ?>
<img id = 'test-image-js' src = '#' style = "display: none"/>
<div id = 'test-form-js' class="site-contact">
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'test-form']); ?>

            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Submit'); ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php Modal::end(); ?>