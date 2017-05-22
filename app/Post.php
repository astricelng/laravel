<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{

// Post busca en tabla Posts por defecto o 
	//se especifica en atributo protegido

	protected $table = 'posts';

	protected $fillable = ['title','description','url'];

	// columnas que no necesitan ser llenadas
	protected $guarded = [];

}