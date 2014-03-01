<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:21
 */

class Avaliacao extends Eloquent {

    protected $table = 'avaliacao';

    public function turma() {
    	return $this->hasMany('Turma');
    }

    public function user() {
    	return $this->hasMany('User');
    }

    public function pergunta() {
    	return $this->belongsTo('Pergunta');
    }
}