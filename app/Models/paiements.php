<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;


class paiements extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference',
        'id_votant',
        'nb_categorie',
        'nb_artiste',
        'statut',
    ];

    public static function initialisation($reference, $id_votant, $nb_categorie, $nb_artiste) {
        $init_transaction = self::create([
            'reference'    => $reference,
            'id_votant'    => $id_votant,
            'nb_categorie' => $nb_categorie,
            'nb_artiste'   => $nb_artiste,
            'statut'       => "INITIATED" // INITIATED PENDING PENDING FAILED
        ]);

        // ORANGE BF
        $data_to_send = [
            "service_id"                => "BF_CASHIN_OM_PART",
            "recipient_phone_number"    => "76537327",
            "amount"                    => 500,
            "partner_id"                => "BF110158",
            "partner_transaction_id"    => $reference,
            "login_api"                 => "05456298",
            "password_api"              => "8RobukocrLwrOph",
            "call_back_url"             => "gutouch.com"
        ];
        $response = Http::post('https://api.gutouch.com/v1/BFVAS1933/cashin', $data_to_send);

        dd( $response );


        return $init_transaction;
    }
}
