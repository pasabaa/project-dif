<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Notice
 *
 * @property $id
 * @property $title
 * @property $body
 * @property $url
 * @property $id_categorie
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Notice extends Model
{

    public function category(){
      return $this->belongsTo(Category::class, 'id_categorie');
    }
    
    static $rules = [
		'title' => 'required',
		'body' => 'required',
		'url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		'id_categorie' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','body','url','id_categorie'];



}
