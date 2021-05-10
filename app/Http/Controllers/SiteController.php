<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Instituicao;
use App\Models\Usuario;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        return view('index', ['instituicoes' => Instituicao::all()]);
    }

    public function instituicao(Request $request, $id)
    {
        if ($id) {
            $inst = Instituicao::find($id);
            if ($inst) {
                return view('instituicao', ['inst' => $inst]);
            } else {
                return view('index', ['instituicoes' => Instituicao::all()]);
            }
        } else {
            return view('index', ['instituicoes' => Instituicao::all()]);
        }
    }

    public function instituicoes(Request $request)
    {
        // dd(collect(Auth::guard('usuario')->user()->favoritos()->get())->keyBy('instituicao_id')->toArray());
        $list = Instituicao::all();
        $favoritos = [];

        if (Auth::guard('usuario')->user()) {
            $favoritos = collect(Auth::guard('usuario')->user()->favoritos()->get())->keyBy('instituicao_id')->toArray();
        }

        if ($request->busca) {
            $list = Instituicao::where('nome', 'like', '%' . $request->busca . '%')->get();
        }

        return view('instituicoes', ['list' => $list, 'favoritos' => $favoritos]);
    }

    public function login(Request $request)
    {
        if ($request->post()) {
            $credenciais = ['email' => $request->email, 'password' => $request->senha];
            if (Auth::guard('usuario')->attempt($credenciais)) {
                return redirect()->route('painel.index');
            } else {
                return redirect()->back()->withInput($request->except('senha'))->with(['classe' => 'danger', 'msg-login' => 'Login e/ou senha incorretos.']);
            }
        }
        return view('login');
    }

    public function criarConta(Request $request)
    {
        $verificar = Usuario::where('email', $request->email)->first();
        if ($verificar) {
            return redirect()->back()->withInput($request->except('senha'))->with(['classe' => 'danger', 'msg' => 'Email já cadastrado']);
        }

        $user = new Usuario;
        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->senha = Hash::make($request->senha);
        $user->save();

        $credenciais = ['email' => $request->email, 'password' => $request->senha];
        if (Auth::guard('usuario')->attempt($credenciais)) {
            return redirect()->route('todas_insts')->with(['classe' => 'success', 'msg-cadastro' => 'Email cadastrado com sucesso']);
        } else {
            return redirect()->back()->with(['classe' => 'success', 'msg' => 'Email cadastrado com sucesso']);
        }
    }
}
