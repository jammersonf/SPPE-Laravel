<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:25
 */

class Pergunta extends Eloquent
{

    protected $table    = 'pergunta';
    protected $fillable = array('titulo', 'status', 'avaliacao_id');

    public function avaliacao()
    {
    	return $this->belongsTo('Avaliacao');
    }

    public function resposta()
    {
    	return $this->hasMany('Resposta');
    }
}