<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:21
 */

class Avaliacao extends Eloquent {

    protected $table = 'avaliacao';
    public $timestamps = true;
    protected $fillable = array('*');

    public function turma() {
    	return $this->belongsTo('Turma');
    }

    public function coordenador() {
    	return $this->belongsTo('User');
    }

    public function perguntas() {
    	return $this->hasMany('Pergunta');
    }
}