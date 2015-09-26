<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * Film Controller
 */
class FilmController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 5,
        'maxLimit' => 15,
        'sortWhiteList' => [
            'film_id', 'title'
        ]
    ];
}
