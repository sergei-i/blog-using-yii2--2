<?php

namespace app\modules\admin;

use yii\filters\AccessControl;
use Yii;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            //return Yii::$app->user->identity->role === 'admin';

                            if (Yii::$app->user->identity->role !== 'admin') {
                                return Yii::$app->getResponse()->redirect('/');
                            } else {
                                return true;
                            }
                        }
                    ]
                ]
            ]

        ];
    }
}
