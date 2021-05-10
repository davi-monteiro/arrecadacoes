<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Models\Favorito;
use App\Models\Doacao;

class PainelController extends Controller
{
    public function index(Request $request)
    {
        return view('Painel.index');
    }

    public function fazerDoacao(Request $request)
    {
        $valor = str_replace(',', '.', str_replace('.', '', $request->valor));
        if ($valor < 5) {
            return redirect()->back()->with(['msg-erro' => 'Você não pode doar menos que R$ 5,00!']);
        }

        $doacao = new Doacao;
        $doacao->usuario_id = Auth::user()->id;
        $doacao->valor = $valor;
        $doacao->instituicao_id = $request->instituicao;
        if ($request->recorrente)
            $doacao->recorrencia = $request->recorrente;
        $doacao->save();

        return redirect()->back()->with(['doacao' => $doacao]);
    }

    public function favorito(Request $request)
    {
        $verificar = Favorito::where('usuario_id', Auth::user()->id)->where('instituicao_id', $request->id)->first();
        if ($verificar) {
            $verificar->delete();
        } else {
            $fav = new Favorito;
            $fav->usuario_id = Auth::user()->id;
            $fav->instituicao_id = $request->id;
            $fav->save();
        }

        return redirect()->back();
    }

    public function alterarDados(Request $request)
    {
        $user = Usuario::find(Auth::user()->id);

        $user->nome = $request->nome;
        if ($request->senha)
            $user->senha = Hash::make($request->senha);
        $user->save();

        return redirect()->back()->with(['msg-dados' => 'Seus dados foram altaterados com sucesso!']);
    }
}
