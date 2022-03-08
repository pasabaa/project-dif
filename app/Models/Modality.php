<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Modality
 *
 * @property $id
 * @property $modality
 * @property $created_at
 * @property $updated_at
 *
 * @property Service[] $services
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Modality extends Model
{
    
    static $rules = [
		'modality' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['modality'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services()
    {
        return $this->hasMany(Service::class);
    }
    

}
