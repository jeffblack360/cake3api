<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Film Controller
 */
class FilmController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 100,
        'fields' => [
            'film_id', 'title', 'description'
        ],
        'sortWhiteList' => [
            'film_id', 'title', 'description'
        ]
    ];
}
