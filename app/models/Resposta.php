<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:27
 */

class Resposta extends Eloquent {

    protected $table   = 'resposta';
    public $timestamps = false;
    protected $fillable= array('titulo', 'pergunta_id', 'user_id');

    public function pergunta()
    {
    	return $this->belongsTo('Pergunta');
    }

    public function user()
    {
    	return $this->belongsTo('User');
    }
}