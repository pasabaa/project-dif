<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Type
 *
 * @property $id
 * @property $type
 * @property $created_at
 * @property $updated_at
 *
 * @property Service[] $services
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Type extends Model
{
    
    static $rules = [
		'type' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['type'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services()
    {
        return $this->hasMany(Service::class);
    }
    

}
