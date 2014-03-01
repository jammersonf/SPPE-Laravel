<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:26
 */

class PlanosEnsino extends Eloquent {

    protected $table        = 'planosEnsino';

    public function turma() {
    	return $this->hasMany('Turma');
    }

    public function conteudos() {
    	return $this->belongsTo('Conteudos');
    }
}