<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Film Entity.
 *
 * @property int $film_id
 * @property \App\Model\Entity\Film $film
 * @property string $title
 * @property string $description
 * @property string $release_year
 * @property int $language_id
 * @property int $original_language_id
 * @property \App\Model\Entity\Language $language
 * @property int $rental_duration
 * @property float $rental_rate
 * @property int $length
 * @property float $replacement_cost
 * @property string $rating
 * @property string $special_features
 * @property \Cake\I18n\Time $last_update
 * @property \App\Model\Entity\Actor[] $actor
 * @property \App\Model\Entity\Category[] $category
 */
class Film extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'film_id' => false,
    ];
}
