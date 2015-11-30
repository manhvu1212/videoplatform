<?php

namespace App\Entities;


use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [];
    protected $connection = 'mongodb';
    protected $collection = 'Settings';


}
