<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Request extends Model
{

    protected $table = "requests"; // vincular amb model db

    protected $primaryKey = ["student_id", "offer_id"]; //en cas de no tindre id hem de posar les pk
    public $incrementing = false; //degut a que no hi ha cap autoincrement

    public function student()
    {
        return $this->belongsTo(User::class);
    }

    public function offer()
    {
        return $this->belongsTo(offer::class, 'offer_id');
    }

    use HasFactory;
}
