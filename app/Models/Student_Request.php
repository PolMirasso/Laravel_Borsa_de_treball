<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_Request extends Model
{
    protected $table = "requests"; // no seria necesari pero vincules el model amb la db

    protected $primaryKey = ["student_id", "offer_id"]; //en cas de no tindre id hem de posar les pk

    use HasFactory;
}
