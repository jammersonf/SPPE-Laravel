<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:25
 */

class Pergunta extends Eloquent {

    protected $table        = 'pergunta';

    public function avaliacao() {
    	return $this->hasMany('Avaliacao');
    }

    public function resposta() {
    	return $this->belongsTo('Resposta');
    }
}