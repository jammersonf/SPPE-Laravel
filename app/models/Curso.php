<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:27
 */

class Curso extends Eloquent {

    protected $table        = 'curso';

    public function user() {
    	return $this->hasMany('User');
    }

    public function base() {
    	return $this->belongsTo('Base');
    }
}