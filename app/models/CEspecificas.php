<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:24
 */

class CEspecificas extends Eloquent {

    protected $table    = 'c_especificas';
    public $timestamps  = false;
    protected $fillable = array('conhecimento', 'fazer', 'agir', 'ser', 'estrategias_ensino', 'num_aulas', 'semana_datas', 'conteudos_id');

    public function conteudos()
    {
        return $this->belongsTo('Conteudos');
    }

}