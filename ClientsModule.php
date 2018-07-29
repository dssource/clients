<?php
namespace dssource\clients;

use dssource\basic\core\Themes;
use Yii;
use yii\web\GroupUrlRule;
use dssource\basic\core\ModuleInterface;

/**
 * Class Admin Module
 * @package app\modules\admin
 */
class ClientsModule extends \yii\base\Module implements ModuleInterface
{
    /**
     * @var string the namespace that controller classes are in.
     */
    public $controllerNamespace = 'dssource\clients\controllers';
    public $layout = 'admin';
    /**
     * Initializes the module.
     */
    public function init()
    {
        parent::init();
    }

    public $urlRules = [
        'prefix' => 'admin',
        'routePrefix' => 'clients',
        'rules' => [
            'clients' => 'admin-clients/index',
        ],
    ];

    public function bootstrap($app)
    {
        $app->getUrlManager()->rules[] = new GroupUrlRule($this->urlRules);
    }

    public function behaviors(){
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['developer', 'admin'],
                    ],
                ],
            ],
        ];
    }

    public static function menu()
    {
        return [
            [
                'label' => '<a href="#"><span class="glyphicon glyphicon-star"></span> Клиенты</a>',
                'items' => [
                    [
                        'label' => 'Обзор',
                        'url' => ['/admin/clients']
                    ],
                ],

            ]
        ];
    }
}