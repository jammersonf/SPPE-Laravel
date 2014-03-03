<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:25
 */

class Pergunta extends Eloquent {

    protected $table = 'pergunta';
    public $timestamps = true;
	protected $fillable = array('*');

    public function avaliacao() {
    	return $this->belongsTo('Avaliacao');
    }

    public function respostas() {
    	return $this->hasMany('Resposta');
    }
}