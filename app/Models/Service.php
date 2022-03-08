<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 *
 * @property $id
 * @property $name
 * @property $id_type
 * @property $area
 * @property $id_modality
 * @property $description
 * @property $url
 * @property $created_at
 * @property $updated_at
 *
 * @property Modality $modality
 * @property Type $type
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Service extends Model
{
    
    static $rules = [
		'name' => 'required',
		'id_type' => 'required',
		'area' => 'required',
		'id_modality' => 'required',
		'description' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','id_type','area','id_modality','description','url'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function modality()
    {
        return $this->belongsTo(Modality::class,'id_modality');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->belongsTo(Type::class, 'id_type');
    }
    

}
