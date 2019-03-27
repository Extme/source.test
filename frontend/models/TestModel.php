<?php
/**
 * Created by PhpStorm.
 * User: Exitme
 * Date: 26.03.2019
 * Time: 21:20
 */

namespace frontend\models;

use Yii;
use yii\base\Model;


class TestModel extends Model
{

    public $verifyCode;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

}