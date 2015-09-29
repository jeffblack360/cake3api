<?php
namespace App\Controller\Api;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * App Controller
 *
 * @property \App\Model\Table\AppTable $App
 */
class AppController extends Controller
{
    use \Crud\Controller\ControllerTrait;
    
    public $components = [
        'Crud.Crud' => [
            'actions' => [
                'Crud.Index',
                'Crud.View',
                'Crud.Add',
                'Crud.Edit',
                'Crud.Delete'
            ],
            'listeners' => [
                'Crud.Api',
                'Crud.ApiPagination',
                'Crud.ApiQueryLog'
            ]
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        
        $this->loadComponent('RequestHandler');

        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form',
                'ADmad/JwtAuth.Jwt' => [
                    'parameter' => '_token',
                    'userModel' => 'Staff',
                    'scope' => ['Staff.active' => 1],
                    'fields' => [
                        'id' => 'staff_id'
                    ]
                ]
            ]
        ]);
    }

}
