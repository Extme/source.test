<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use linslin\yii2\curl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => null,
            ],
        ];
    }

    /**
     *
     * @return array
     */

    public function generateTree(){

        $countOfNodes = rand(100, 500);

        $tree = [];

        for($x = 0; $x < $countOfNodes; $x++ ){
            $tree[$x] = [];
            $countOfBranches = rand(1, 5);
            for($y = 0; $y < $countOfBranches; $y++ ) {
                $tree[$x][$y] = [];
                $countOfLeaves = rand(1, 5);
                for($z = 0; $z < $countOfLeaves; $z++ ) {
                    $tree[$x][$y][$z] = 'node_'.$x.' branch_'.$y;
                }
            }
        }

        return $tree;

    }


    public function actionIndex()
    {

        $tree = $this->generateTree();
        
        return $this->render('index', [
            'tree' => $tree,
        ]);

    }

    /**
     * request to rapidapi.
     *
     * @return array
     */
    public function actionApi()
    {

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $link = "https://giphy.p.rapidapi.com/v1/gifs/random?tag=random&api_key=dc6zaTOxFJmzC";

        $curl = new curl\Curl();

        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array('Content-Type: application/json',
                'X-RapidAPI-Key: f87b490bf5msha1b09c21f5a9affp1c894ajsndb5e47b80bc0'),
        ];

        $response = $curl->setOptions($options)
            ->get($link);

        $response = json_decode($response);
        $imageUrl = $response->data->images->fixed_height->url;


        return [
            'success' => true,
            'data' => $imageUrl
        ];

    }
}
