<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;

/**
 * Users Controller
 */
class UsersController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 5,
        'maxLimit' => 15,
        'sortWhiteList' => [
            'username'
        ]
    ];
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'token']);
    }
    
    public function add()
    {
        $this->Crud->on('afterSave', function(Event $event) {
            if ($event->subject->created) {
                $this->set('data', [
                    'staff_id' => $event->subject->entity->id,
                    'token' => $token = \JWT::encode(
                            [
                        'id' => $event->subject->entity->id,
                        'exp' => time() + 604800
                            ], Security::salt())
                ]);
                $this->Crud->action()->config('serialize.data', 'data');
            }
        });
        
        return $this->Crud->execute();
    }

    public function token()
    {
        $user = $this->Auth->identify();
        
        if (!$user) {
            throw new UnauthorizedException('Invalid username or password');
        }

        $this->set([
            'success' => true,
            'data' => [
                'token' => $token = \JWT::encode([
                    'id' => $user['id'],
                    'exp' => time() + 604800
                        ], Security::salt())
            ],
            '_serialize' => ['success', 'data']
        ]);
    }
}
