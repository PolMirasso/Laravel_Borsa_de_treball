<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_Offer extends Model
{
    protected $table = "info_offers";
    protected $primaryKey = "offer_id";

    use HasFactory;
}
