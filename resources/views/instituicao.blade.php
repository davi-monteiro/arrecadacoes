@extends('Layouts.template')
@section('titulo', 'Home - Seja bem vindo')


@section('conteudo')
<section>
    <div class="bg-instuicao">
        <h2 class="text-center py-5 text-white text-uppercase"><i class="bi bi-bookmark-heart"></i> {{$inst['nome']}}</h2>
    </div>
    <div class="container py-5">
        <div class="row d-flex align-items-center">
            <div class="col-md-5">
                <h3 class="font-weight-bold text-uppercase">
                    Sobre nós
                </h3>
                <p>
                    {{$inst['resumo']}}
                </p>
                <h3 class="font-weight-bold">
                    Contato
                </h3>
                <p>
                    {{$inst['email']}}
                </p>
                <h3 class="font-weight-bold">
                    Arrecadações recebidas
                </h3>
                <p>
                    R$ <span class="valor">{{number_format($inst->doacoes->sum('valor'),2,",",".")}}</span>
                </p>
            </div>
            <div class="col-md-7">
                <div class="border rounded p-4">
                    <h4 class="font-weight-bold text-uppercase text-primary mb-4">
                        Fazer doação
                    </h4>
                    <form method="POST" action="{{route('painel.doacao')}}">
                        @csrf
                        @if(Auth::guard('usuario')->user())
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="formNome">Nome</label>
                                <input name="nome" disabled type="text" class="form-control text-uppercase" value="{{Auth::guard('usuario')->user()->nome}}" id="formNome">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="formEmail">Email</label>
                                <input name="email" disabled type="email" class="form-control" value="{{(Auth::guard('usuario')->user()->email)}}" id="formEmail">
                            </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="valor">Valor</label>
                            <input name="valor" type="text" class="form-control" id="valor" placeholder="1000,00">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input name="recorrente" value="1" class="form-check-input" type="checkbox" id="formRecorrente">
                                <label class="form-check-label" for="formRecorrente">
                                    Doação recorrente
                                </label>
                            </div>
                        </div>
                        @if(Auth::guard('usuario')->user())
                        <input type="hidden" name="instituicao" value="{{$inst['id']}}">
                        <button type="submit" class="btn btn-success w-100 font-weight-bold text-uppercase">Doar agora</button>
                        @else
                        <div class="alert alert-primary" role="alert">
                            Para doar você precisa estar logado no sistema <a href="{{route('login')}}" class="alert-link">Clique aqui</a> e doe agora mesmo.
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade modal-sucesso" id="" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase"><i class="bi bi-check-all bg-success rounded text-white px-1"></i> Doação concluída</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Muito obrigado! <br>

                Você doou <b>R$ @if(session('doacao')) <span class="valor">{{session('doacao')['valor']}}</span> @endif </b> para a <b>{{$inst['nome']}}</b>.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success w-100" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-erro" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <p>
                    <i class="bi bi-exclamation-octagon-fill text-danger font-4"></i>
                </p>
                <h5 class="modal-title">OPs, algo deu errado</h5>
                <p>
                    Não é possível doar menos que R$ 5,00!
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger w-100" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
@endsection