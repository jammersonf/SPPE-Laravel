<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:24
 */

class CEspecificas extends Eloquent {

    protected $table = 'competencias_especificas';
    public $timestamps = false;
	protected $fillable = array('*');

    public function conteudo() {
    	return $this->belongsTo('Conteudos');
    }
}