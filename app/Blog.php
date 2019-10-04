<?php

namespace App;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use Notifiable;
    protected $fillable = ['title','description'];
}
