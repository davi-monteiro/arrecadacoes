<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Instituicao;

class InstituicoesController extends Controller
{
    public function listar(Request $request, $id = null)
    {
        $array = ['erros' => null, 'return' => 'success', 'data' => []];
        $array['data'] = Instituicao::all();

        if ($id) {
            $inst = Instituicao::find($id);
            if ($inst) {
                $array['data'] = $inst;
            } else {
                $array['erros'] = true;
                $array['return'] = 'Nao foi encontrado';
            }
        }

        return response()->json($array);
    }

    public function insert(Request $request)
    {
        $array = ['erros' => null, 'return' => 'success', 'data' => []];

        if ($request->post()) {

            if ($request->header('Token') == 'J14E06S95U13S') {

                $validator = Validator::make(
                    $request->all(),
                    [
                        'nome' => 'required|string',
                        'email' => 'required|string',
                        'resumo' => 'required|string',
                    ],
                    $messages = [
                        'required' => 'Verifique o input :attribute com erro.'
                    ],
                );

                if ($validator->fails()) {
                    $array['return'] = $validator->errors();
                    $array['erros'] = true;
                } else {
                    $array['data'] = $request->all();

                    if (Instituicao::where('email', $request->email)->count() > 0) {
                        $array['erros'] = true;
                        $array['return'] = 'Email ja esta cadastrado';
                        return response()->json($array);
                    }

                    $inst = new Instituicao;
                    $inst->nome = $request->nome;
                    $inst->email = $request->email;
                    $inst->resumo = $request->resumo;
                    $inst->save();
                }
            } else {
                $array['return'] = 'Erro de autenticacao';
            }
        }

        return response()->json($array);
    }

    public function update(Request $request, $id)
    {
        $array = ['erros' => null, 'return' => 'success', 'data' => []];

        if ($request->method() == 'PUT') {

            if ($request->header('Token') == 'J14E06S95U13S') {
                $inst = Instituicao::find($id);

                if ($inst) {

                    if ($request->nome)
                        $inst->nome = $request->nome;
                    if ($request->email)
                        $inst->email = $request->email;
                    if ($request->resumo)
                        $inst->resumo = $request->resumo;
                    $inst->save();

                    $array['data'] = $request->all();
                } else {
                    $array['erros'] = true;
                    $array['return'] = 'Nada encontrado';
                }
            } else {
                $array['return'] = 'Erro de autenticacao';
            }
        } else {
            $array['erros'] = true;
            $array['return'] = 'Esse verbo só permite o método PUT';
        }
        return response()->json($array);
    }

    public function delete(Request $request, $id)
    {
        $array = ['erros' => null, 'return' => 'success', 'data' => []];
        if ($request->method() == 'DELETE') {
            if ($request->header('Token') == 'J14E06S95U13S') {
                $inst = Instituicao::find($id);
                if ($inst) {
                    $array['data'] = $inst->id;
                    $inst->doacoes()->delete();
                    $inst->favoritos()->delete();
                    $inst->delete();
                } else {
                    $array['return'] = 'Nada encontrado';
                }
            }
        }
        return response()->json($array);
    }
}
