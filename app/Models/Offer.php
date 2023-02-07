<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = "offers";
    protected $primaryKey = "offer_id";

    use HasFactory;

    public function Info_Offer()
    {
        return $this->hasOne("App\Info_Offer");
    } //no provat encara (  Offer::find(1)->InfoOffer) retorne la oferta + la info
}
