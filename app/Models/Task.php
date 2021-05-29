<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * タスク所有ユーザの取得
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}