<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:23
 */

class Conteudos extends Eloquent {

    protected $table = 'conteudos';
    public $timestamps = false;
	protected $fillable = array('*');

    public function planosEnsino() {
    	return $this->belongsTo('PlanosEnsino');
    }

    public function competenciasEspecificas() {
    	return $this->hasMany('CompetenciasEspecificas');
    }
}