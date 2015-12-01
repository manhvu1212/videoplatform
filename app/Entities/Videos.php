<?php

namespace App\Entities;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Model;
class Videos extends Model
{
    protected $fillable = [];
    protected $connection = 'mongodb';
    protected $collection = 'Videos';

}
