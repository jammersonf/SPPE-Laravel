<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:22
 */

Class Base extends Eloquent {

    protected $table        = 'base';

    public function curso() {
    	return $this->hasMany('Curso');
    }

    public function turma() {
    	return $this->belongsTo('Turma');
    }
}