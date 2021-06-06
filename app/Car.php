<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Pilot;
use App\Brand;


class Car extends Model
{
    protected $fillable = [
    'name',
    'model',
    'kw',
    //chiave esterna
    'brand_id',
    ];

    public function pilots() {
        return $this -> belongsToMany(Pilot::class);

    }
    public function brand() {
        return $this -> belongsTo(Brand::class);

    }
}
