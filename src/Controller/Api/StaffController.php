<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;

/**
 * Staff Controller
 */
class StaffController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 5,
        'maxLimit' => 15,
        'sortWhiteList' => [
            'username'
        ]
    ];
    
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'token']);
    }
    
    public function add()
    {
//        $this->Crud->on('afterSave', function(\Cake\Event\Event $event) {
//            if ($event->subject->last_update) {
//                $this->set('data', [
//                    'staff_id' => $event->subject->entity->staff_id,
//                    'token' => $token = \JWT::encode(
//                            [
//                        'staff_id' => $event->subject->entity->staff_id,
//                        'exp' => time() + 604800
//                            ], Security::salt())
//                ]);
//                $this->Crud->action()->config('serialize.data', 'data');
//            }
//        });
        return $this->Crud->execute();
    }

}
