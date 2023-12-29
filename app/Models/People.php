<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;
    protected $table = 'peoples';
    protected $fillable = ['name', 'age', 'gender', 'mobileno', 'accessibility', 'officer_id','form_delivered',];

    public function officer()
    {
        return $this->belongsTo(User::class, 'officer_id', 'userID'); // Specify foreign key and owner key
    }
}
