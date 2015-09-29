<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Staff Entity.
 *
 * @property int $staff_id
 * @property \App\Model\Entity\Staff $staff
 * @property string $first_name
 * @property string $last_name
 * @property int $address_id
 * @property \App\Model\Entity\Addres $addres
 * @property string|resource $picture
 * @property string $email
 * @property int $store_id
 * @property \App\Model\Entity\Store $store
 * @property bool $active
 * @property string $username
 * @property string $password
 * @property \Cake\I18n\Time $last_update
 */
class Staff extends Entity
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
        'staff_id' => false,
    ];
}
