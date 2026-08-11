<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uspdev\Replicado\Pessoa;

class IndexController extends Controller
{
    public function index(){
    Gate::authorize('admin');
        if (auth()->check()) {
            $curso = Pessoa::retornarCursoPorCodpes(auth()->user()->codpes)['nomcur'];
        } else {
            $curso = 'usuário não logado';
        }

        return view('index', ['curso' => $curso]);
    }
}
