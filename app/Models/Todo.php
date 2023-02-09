<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function getTodoClass()
    {
        $allStatuses = [
            'Done' => 'bg-green-300',
            'Pending' => 'text-red-400'
        ];

        return $allStatuses[$this->status->name];
    }



}
