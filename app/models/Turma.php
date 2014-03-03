<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:27
 */

class Turma extends Eloquent {

    protected $table = 'turma';
    public $timestamps = false;
    protected $fillable = array('*');

    public function curso() {
    	return $this->belongsTo('Curso');
    }

    public function coordenador() {
    	return $this->belongsTo('User');
    }

    public function base() {
    	return $this->belongsTo('Base');
    }

    public function planosAula() {
    	return $this->hasMany('PlanosAula');
    }

    public function planosEnsino() {
    	return $this->hasMany('PlanosEnsino');
    }

    public function avaliacao() {
    	return $this->hasMany('Avaliacao');
    }
}