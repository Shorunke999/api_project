<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentsModel extends Model
{
    use HasFactory;
    protected $table = 'comment_table';
    public function two(){
        return $this->belongsTo(User::class);
    }
}
