<?php

namespace App\Entities;
use Jenssegers\Mongodb\Model;
class Videos extends Model
{
    protected $fillable = [];
    protected $connection = 'mongodb';
    protected $collection = 'Videos';

}
