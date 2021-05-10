@extends('Layouts.template')
@section('titulo', 'Home - Seja bem vindo')


@section('conteudo')
<section>
    <div class="bg-instuicao">
        <h2 class="text-center py-5 text-white text-uppercase"><i class="bi bi-person-square"></i> Meu painel</h2>
    </div>
    <div class="container py-5 px-0">
        <div class="row d-flex align-items-center">
            <div class="col-12">
                <ul class="nav nav-tabs font-weight-bold" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="favoritos-tab" data-toggle="tab" href="#favoritos" role="tab" aria-controls="favoritos" aria-selected="false">Favoritos <i class="bi bi-stars"></i></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="recorrentes-tab" data-toggle="tab" href="#recorrentes" role="tab" aria-controls="recorrentes" aria-selected="false">Doações <i class="bi bi-bookmark-heart"></i></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="dados-tab" data-toggle="tab" href="#dados" role="tab" aria-controls="dados" aria-selected="true">Dados <i class="bi bi-person-circle"></i></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="pt-4 tab-pane fade  show active" id="favoritos" role="tabpanel" aria-labelledby="favoritos-tab">
                        <div class="row">

                            @if(count(Auth::user()->favoritos()->get()) == 0)
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading text-uppercase">Olá, {{explode(' ',Auth::user()->nome)[0]}}</h4>
                                <p>Percebemos que você ainda não adicionou nenhuma instiuição ao seus favoritos.</p>
                                <hr>
                                <p class="mb-0"><a href="{{route('todas_insts')}}">Clique aqui</a> e selecione uma agora mesmo.</p>
                            </div>
                            @endif

                            @foreach(Auth::user()->favoritos()->get() as $fav)
                            <div class="col-md-6 col-lg-4">
                                <div class="p-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="w-100 text-center mb-4">
                                                <i class="bi bi-bookmark-heart text-primary" style="font-size: 3rem;"></i>
                                            </div>
                                            <h5 class="card-title text-center text-uppercase">{{$fav->instituicao['nome']}}</h5>
                                            <p class="card-text" style="min-height: 60px;">{{$fav->instituicao['resumo']}}</p>
                                            <a href="{{route('instituicao',['id'=>$fav->instituicao['id']])}}" class="btn font-weight-bold text-uppercase btn-success w-100">Quero doar</a>
                                            <a href="{{route('favorito', ['id'=> $fav->instituicao['id']])}}" class="btn font-weight-bold text-uppercase btn-info btn-sm rounded mt-2 w-100">REMOVER <i class="bi bi-star-fill"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="pt-4 tab-pane fade" id="recorrentes" role="tabpanel" aria-labelledby="recorrentes-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nome da Instuição</th>
                                                <th scope="col" class="text-center">Recorrência</th>
                                                <th scope="col">Data da doação</th>
                                                <th scope="col">Valor doado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(Auth::user()->doacoes()->get() as $chave => $doacao)
                                            <tr>
                                                <th scope="row">{{$chave + 1}}</th>
                                                <td>{{$doacao->instituicao->nome}}</td>
                                                <td class="font-2 text-center"><?= ($doacao->recorrencia == 1) ? '<i class="bi bi-toggle-on text-primary"></i>' : '<i class="bi bi-toggle-off "></i>'; ?></td>
                                                <td>{{date_format($doacao->created_at,'d/m/Y H:m:s')}}</td>
                                                <td>R$ <span class="valor font-weight-bold">{{number_format($doacao->valor,2,",",".")}}</span></td>
                                            </tr>
                                            @endforeach
                                            <tr class="bg-dark text-white">
                                                <td>Total</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><b><i> R$ {{number_format(Auth::user()->doacoes()->sum('valor'),2, ",", ".")}}</i></b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4 tab-pane fade" id="dados" role="tabpanel" aria-labelledby="dados-tab">
                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="{{route('painel.alterarDados')}}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="formNome">Nome</label>
                                            <input name="nome" type="text" class="form-control text-uppercase" value="{{ Auth::user()->nome }}" id="formNome">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="cadEmail">Email</label>
                                            <input name="email" type="email" value="{{Auth::user()->email}}" disabled class="form-control" id="cadEmail">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="cadSenha">Nova Senha</label>
                                            <input name="senha" type="password" class="form-control" name="{{ old('password') }}" id="cadSenha">
                                        </div>
                                    </div>
                                    @if(session('msg'))
                                    <div class="alert alert-{{session('classe')}}">
                                        <p class="m-0">{{session('msg')}}</p>
                                    </div>
                                    @endif
                                    <button type="submit" class="btn btn-secondary w-100">Atualizar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade modal-alterar-dados" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dados alterados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Seus dados foram alterados com sucesso!
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success w-100" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
@endsection