<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Family
 *
 * @property $id
 * @property $name
 * @property $target
 * @property $addressed
 * @property $requirements
 * @property $phone_number
 * @property $id_responsable
 * @property $created_at
 * @property $updated_at
 *
 * @property ResponsableFamily $responsableFamily
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Family extends Model
{
    
    static $rules = [
		'name' => 'required',
		'target' => 'required',
		'addressed' => 'required',
		'requirements' => 'required',
		'id_responsable' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','target','addressed','requirements','phone_number','id_responsable'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function responsableFamily()
    {
        return $this->belongsTo(ResponsableFamily::class, 'id_responsable');
    }
    

}
