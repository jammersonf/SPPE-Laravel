<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:27
 */

class Resposta extends Eloquent {

    protected $table        = 'resposta';

    public function pergunta() {
    	return $this->hasMany('Pergunta');
    }

    public function user() {
    	return $this->hasOne('User');
    }
}