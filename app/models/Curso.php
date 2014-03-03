<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:27
 */

class Curso extends Eloquent {

    protected $table = 'curso';
    public $timestamps = false;
	protected $fillable = array('*');


    public function coordenador() {
    	return $this->belongsTo('User');
    }

    public function bases() {
    	return $this->hasMany('Base');
    }
}