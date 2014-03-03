<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:27
 */

class Resposta extends Eloquent {

    protected $table = 'resposta';
    public $timestamps = false;
	protected $fillable = array('*');

    public function pergunta() {
    	return $this->belongsTo('Pergunta');
    }

    // aluno
    public function aluno() {
    	return $this->belongsTo('User');
    }

    // professor
    public function professor() {
    	return $this->belongsTo('User');
    }

}