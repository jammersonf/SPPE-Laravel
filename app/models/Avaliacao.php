<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:21
 */

class Avaliacao extends Eloquent {

    protected $table = 'avaliacao';
    public $timestamps = false;
    protected $fillable = array('conceito', 'comentario', 'turma_id', 'user_id', 'data_avaliacao');

    public function turma()
    {
    	return $this->belongsTo('Turma');
    }

    public function user()
    {
    	return $this->belongsTo('User');
    }

    public function pergunta()
    {
    	return $this->hasMany('Pergunta');
    }
}