<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ResponsableFamily
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property Family[] $families
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ResponsableFamily extends Model
{
    
    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function families()
    {
        return $this->hasMany(Family::class);
    }
    

}
