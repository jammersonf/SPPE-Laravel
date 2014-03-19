<?php
/**
 * Created by PhpStorm.
 * User: jammerson.muniz
 * Date: 27/02/14
 * Time: 21:27
 */

class Turma extends Eloquent {

    protected $table    = 'turma';
    public $timestamps  = false;
    protected $fillable = array('curso_id', 'user_id', 'periodo', 'base_id', 'turno');

    public function curso()
    {
    	return $this->belongsTo('Curso');
    }

    public function user()
    {
    	return $this->belongsTo('User');
    }

    public function base()
    {
    	return $this->belongsTo('Base');
    }

    public function planos_aula()
    {
    	return $this->hasMany('Planos_aula');
    }

    public function planos_ensino()
    {
    	return $this->hasMany('Planos_ensino');
    }

    public function avaliacao()
    {
    	return $this->hasMany('Avaliacao');
    }

    public function busca_by_user()
    {
        $turma = \DB::table('turma')
            ->join('curso', 'curso.id', '=', 'turma.curso_id')
            ->join('base', 'base.id', '=', 'turma.base_id')
            ->where('turma.user_id', '=', Session::get('id'))
            ->get(array('turma.id', 'curso.nome_curso', 'turma.periodo', 'base.nome_base', 'turma.turno'));

        return $turma;
    }

    public function busca_by_id($id)
    {
        $turma = DB::table('turma')
            ->join('user', 'user.id', '=', 'turma.user_id')
            ->join('curso', 'curso.id', '=', 'turma.curso_id')
            ->join('base', 'base.id', '=', 'turma.base_id')
            ->where('turma.id', '=', $id)
            ->get();

        return $turma;
    }

    public function verifica_turma($id)
    {
        $turma = DB::table('turma')
            ->where(function($query) use ($id)
            {
                $query->where('id', $id)
                ->where('user_id', Session::get('id'));
            })
            ->get();

        return $turma;
    }
}