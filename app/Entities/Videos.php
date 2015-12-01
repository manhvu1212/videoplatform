<?php

namespace App\Entities;
use Illuminate\Database\Eloquent\Model;
class Videos extends Model
{
    protected $fillable = [];
    protected $connection = 'mongodb';
    protected $collection = 'Videos';

}
