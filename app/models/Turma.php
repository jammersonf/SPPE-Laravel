<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:27
 */

class Turma extends Eloquent {

    protected $table        = 'turma';

    public function curso() {
    	return $this->hasMany('Curso');
    }

    public function user() {
    	return $this->hasMany('User');
    }

    public function base() {
    	return $this->hasMany('Base');
    }

    public function planosAula() {
    	return $this->belongsTo('PlanosAula');
    }

    public function planosEnsino() {
    	return $this->belongsTo('PlanosEnsino');
    }

    public function avaliacao() {
    	return $this->belongsTo('Avaliacao');
    }
}