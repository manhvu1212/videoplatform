<?php

namespace App\Entities;

use Jenssegers\Mongodb\Model;

class Folder extends Model
{
    protected $fillable = [];
    protected $connection = 'mongodb';
    protected $collection = 'Folder';

}
