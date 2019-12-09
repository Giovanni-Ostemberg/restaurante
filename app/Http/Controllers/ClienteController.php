<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Controllers\ContaController;
use App\Conta;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::get();
        return view('cliente.index', ['clientes' => $clientes]);
    }

    public function lista($letra){
        $nome=$letra.'%';
        $clientes = Cliente::where('nome', 'like', $nome)->get();
        return view('cliente.index',['clientes'=>$clientes->sortBy('Nome')]);
    }

    public function busca(Request $request){
        $nome=$request->termo.'%';
        $clientes = Cliente::where('nome', 'like', $nome)->get();
        return view('cliente.index',['clientes'=>$clientes->sortBy('Nome')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nome = $request -> nome;
        $cliente->conta_id = $request -> conta_id;
        $cpf = preg_replace("/\D/",'',   $request -> cpf);
        $cliente->cpf = preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cpf);
        $cliente->endereco = $request->rua.', '.$request->numero.' - '.$request->bairro;
        $telefone = preg_replace("/\D/",'', $request->telefone);
        if(strlen($telefone) == 11){
            $cliente->telefone = preg_replace("/(\d{2})(\d{1})(\d{4})(\d{4})/","(\$1) \$2 \$3-\$4", $telefone);

        }else{
            $cliente->telefone = preg_replace("/(\d{2})(\d{4})(\d{4})/","(\$1) \$2-\$3", $telefone);
        }

        if($cliente->conta_id==null){
            $novaConta = new ContaController();
            $cliente->conta_id = $novaConta->store();
        }
        $cliente->save();
        return redirect()->route('clientes.index') ->with('message', 'Cliente criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente = Cliente::findOrFail($cliente->id);
        $cliente->nome = $request -> nome;
        $cpf = preg_replace("/\D/",'', $request -> cpf);
        $cliente->cpf = preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cpf);
        $cliente->endereco = $request ->endereco;
        $telefone = preg_replace("/\D/",'', $request->telefone);
        if(strlen($telefone) == 11){
            $cliente->telefone = preg_replace("/(\d{2})(\d{1})(\d{4})(\d{4})/","(\$1) \$2 \$3-\$4", $telefone);

        }else{
            $cliente->telefone = preg_replace("/(\d{2})(\d{4})(\d{4})/","(\$1) \$2-\$3", $telefone);
        }
        $cliente->conta_id = $request ->conta;
        $cliente->save();
        return redirect()->route('clientes.index') ->with('message', 'Produto alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.index') ->with('message', 'Cliente excluido com sucesso!');

    }
}
