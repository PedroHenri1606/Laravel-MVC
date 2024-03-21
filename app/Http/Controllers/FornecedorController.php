<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function fornecedores(){
        return view('app.fornecedor.index');
    }

    public function listar(Request $request){
        
        $fornecedores = Fornecedor::
              where('nome' , 'like', '%'.request()->input('nome').'%')
            ->where('site' , 'like', '%'.request()->input('site').'%')
            ->where('uf'   , 'like', '%'.request()->input('uf').'%')
            ->where('email', 'like', '%'.request()->input('email').'%')
            ->get();


        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request){
        $msg ='';

        if(request()->input('_token') != ''){
            
            $validation = [
                'nome'  => 'required|min:3|max:40',
                'site'  => 'required',
                'uf'    => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedback = [
                'nome.required' => 'Nome é um campo obrigatorio!',
                'nome.min'      => 'Nome deve conter pelo menos 3 caracterez',
                'nome.max'      => 'Nome deve conter menos que 40 caracterez',
                'site.required' => 'Site é um campo obrigatorio!',
                'uf.required'   => 'UF é um campo obrigatorio!',
                'uf.min'        => 'Uf deve conter 2 caracterez',
                'uf.max'        => 'Uf deve conter somente 2 caracterez', 
                'email.email'   => 'Informe um email valido!',    
            ]; 

            $request->validate($validation,$feedback);  

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = "Cadastro realizado com sucesso!";
        }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
}
