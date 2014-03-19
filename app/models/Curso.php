<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:27
 */

class Curso extends Eloquent
{

    protected $table   = 'curso';
    public $timestamps = false;
    protected $fillable= array('nome_curso', 'eixo', 'user_id');

    public function user()
    {
    	return $this->belongsTo('User');
    }

    public function base()
    {
    	return $this->hasMany('Base');
    }
}