<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    static public function GetAllPartners (){

        $partners = self::all();

        $out = Array();

        foreach ($partners as $partner) {
            $out[$partner->id] = $partner->name;
        }

        return $out;
    }
}
