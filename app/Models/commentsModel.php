<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class commentsModel extends Model
{
    use HasFactory;
    protected $table = 'comments_table';  
    protected $fillable = [
        'comments',
    ];
    public function two(){
        return $this->belongsTo(User::class);
    }

}
