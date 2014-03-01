<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:24
 */

class CEspecificas extends Eloquent {

    protected $table = 'cEspecificas';

    public function conteudos() {
    	return $this->hasMany('Conteudos');
    }
}