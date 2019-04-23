<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Calculation extends Entity
{
    protected $_accessible = [
       
        'id' => false,
        'startdate' => true,
        'enddate' => true,
        'days' => true,
        'calculation' => true,
        'created' => false
    ];
}