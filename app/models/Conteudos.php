<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:23
 */

class Conteudos extends Eloquent {

    protected $table        = 'conteudos';

    public function planosEnsino() {
    	return $this->hasMany('PlanosEnsino');
    }

    public function cEspecificas() {
    	return $this->belongsTo('CEspecificas');
    }
}