@extends('Layouts.template')
@section('titulo', 'Home - Seja bem vindo')


@section('conteudo')
<section>
    <div class="bg-instuicao">
        <h2 class="text-center py-5 text-white text-uppercase"><i class="bi bi-bookmark-heart"></i> Login/Cadastro</h2>
    </div>
    <div class="container py-5">
        <div class="row d-flex align-items-center">
            <div class="col-6">
                <div class="border rounded p-4">
                    <h4 class="font-weight-bold text-center text-uppercase text-primary mb-4">
                        Fazer login
                    </h4>
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="formEmail">Email/Login</label>
                                <input name="email" type="email" class="form-control" id="formEmail">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="formSenha">Senha</label>
                                <input name="senha" type="text" class="form-control" id="formSenha">
                            </div>
                        </div>
                        @if(session('msg-login'))
                        <div class="alert alert-{{session('classe')}}">
                            <p class="m-0">{{session('msg-login')}}</p>
                        </div>
                        @endif
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </form>
                </div>
            </div>
            <div class="col-6">
                <div class="border rounded p-4">
                    <h4 class="font-weight-bold text-center text-uppercase text-success mb-4">
                        Criar conta
                    </h4>
                    <form method="POST" action="{{route('criarConta')}}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="formNome">Nome</label>
                                <input name="nome" type="text" class="form-control" value="{{ old('nome') }}" id="formNome">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cadEmail">Email</label>
                                <input name="email" type="email" class="form-control" value="{{ old('email') }}" id="cadEmail">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cadSenha">Senha</label>
                                <input name="senha" type="password" class="form-control" name="{{ old('password') }}" id="cadSenha">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cadConfSenha">Confirmar Senha</label>
                                <input name="senha_confirmar" type="password" class="form-control" id="cadConfSenha">
                            </div>
                        </div>
                        @if(session('msg'))
                        <div class="alert alert-{{session('classe')}}">
                            <p class="m-0">{{session('msg')}}</p>
                        </div>
                        @endif
                        <button type="submit" class="btn btn-success w-100">Criar conta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection