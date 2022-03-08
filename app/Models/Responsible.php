<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Responsible
 *
 * @property $id
 * @property $name
 * @property $charge
 * @property $area
 * @property $date_charge
 * @property $description
 * @property $url
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Responsible extends Model
{
    
    static $rules = [
		'name' => 'required',
		'charge' => 'required',
		'area' => 'required',
		'url' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','charge','area','date_charge','description','url'];



}
