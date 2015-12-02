<?php

namespace App\Entities;

use Jenssegers\Mongodb\Model;

class Files extends Model
{
    protected $fillable = [];
    protected $connection = 'mongodb';
    protected $collection = 'Files';

}
