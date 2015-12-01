<?php

namespace App\Entities;



use Jenssegers\Mongodb\Model;

class Settings extends Model
{
    protected $fillable = [];
    protected $connection = 'mongodb';
    protected $collection = 'Settings';


}
