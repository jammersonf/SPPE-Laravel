<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:25
 */

class PlanosAula extends Eloquent {

    protected $table        = 'planosAula';

    public function turma() {
    	return $this->hasMany('Turma');
    }
}