<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/01/2016
 * Time: 11:34 AM
 */

namespace App\Entities;

use Jenssegers\Mongodb\Model;

class Slides extends Model
{
    protected $fillable = [];
    protected $connection = 'mongodb';
    protected $collection = 'Slides';

}