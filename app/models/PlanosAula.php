<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:25
 */

class PlanosAula extends Eloquent {

    protected $table    = 'planos_aula';
    public $timestamps  = false;
    protected $fillable = array('competencias', 'conteudo', 'metodologia', 'recursos', 'ambientacao', 'tema_central', 'data_plano', 'turma_id');

    public function turma()
    {
        return $this->belongsTo('Turma');
    }
}