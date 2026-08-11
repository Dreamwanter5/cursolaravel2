<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Livro;

class LivroController extends Controller
{
    public function index(Request $request){
        if($request->has('search')){
            $livros = Livro::where('titulo','like','%'.$request->search.'%')->get();
        } else {
            $livros = Livro::all();
        }

        return view('livros.index',[
            'livros' => $livros
        ]);
    }
    
    public function imagem(Livro $livro)
    {
        return Storage::download($livro->imagem_path, $livro->imagem_original_name);
    }

    public function destroy_imagem(Livro $livro)
    {
        if ($livro->imagem_path && Storage::exists($livro->imagem_path)) {
            Storage::delete($livro->imagem_path);
            $livro->imagem_path = null;
            $livro->imagem_original_name = null;
            $livro->save();
        }
        return back();
    }

    public function create(){
        return view('livros.create');
    }

    public function store(Request $request){
        if ($request->hasFile('imagem')) {
            $livro->imagem_original_name = $request->file('imagem')->getClientOriginalName();
            $livro->imagem_path = $request->file('imagem')->store('livros');
        }

        $livro = new Livro;
        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->ano = $request->ano;
        
        $livro->user_id = auth()->id();
        $livro->save();
        return redirect('/livros');
    }

    public function show(Livro $livro){
        return view('livros.show',[
            'livro' => $livro
        ]);
    }

    public function edit(Livro $livro){
        return view('livros.edit',[
            'livro' => $livro
        ]);
    }

    public function update(Request $request, Livro $livro){
        if ($request->hasFile('imagem')) {
            $livro->imagem_original_name = $request->file('imagem')->getClientOriginalName();
            $livro->imagem_path = $request->file('imagem')->store('livros');
        }

        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->ano = $request->ano;
        
        $livro->user_id = auth()->id();
        $livro->save();
        return redirect("/livros/{$livro->id}");
    }

    public function destroy(Livro $livro)
    {
        if ($livro->imagem_path && Storage::exists($livro->imagem_path)) {
            Storage::delete($livro->imagem_path);
        }
        $livro->delete();
        return redirect('/livros');
    }
}