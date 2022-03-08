<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class About
 *
 * @property $id
 * @property $title
 * @property $body
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class About extends Model
{
    
    static $rules = [
		'title' => 'required',
		'body' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','body'];



}
