<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:23
 */

class Conteudos extends Eloquent
{

    protected $table    = 'conteudos';
    public $timestamps  = false;
    protected $fillable = array('titulo', 'numero', 'turma', 'planos_ensino_id');

    public function planos_ensino()
    {
    	return $this->belongsTo('Planos_ensino');
    }

    public function c_especificas()
    {
    	return $this->hasMany('C_especificas');
    }
}