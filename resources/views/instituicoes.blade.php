@extends('Layouts.template')
@section('titulo', 'Home - Seja bem vindo')


@section('conteudo')
<section>
    <div class="bg-instuicao text-white py-5 text-center">
        <h2 class="text-uppercase"><i class="bi bi-bookmark-heart"></i> Todas instituições</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing, elit. Similique placeat ullam iste quas</p>
    </div>
    <div class="container">
        <div class="row py-5">
            @if(session('msg-cadastro'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Cadastro efetuado com sucesso!</strong> Escolha uma instituição para doar.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif
            @if(count($list) == 0 )
            <div class="col-12">
                <h4 class="text-center text-uppercase">
                    <span class="text-danger font-weight-bold"> Ops :/ </span><br>
                    Não encontramos nenhum resultado para: '<i>{{$_GET['busca']}}</i>'
                </h4>
            </div>
            @endif
            @foreach($list as $inst)
            <div class="col-md-6 col-lg-4">
                <div class="p-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="w-100 text-center mb-4">
                                <i class="bi bi-bookmark-heart text-primary" style="font-size: 3rem;"></i>
                            </div>
                            <h5 class="card-title text-center text-uppercase">{{$inst['nome']}}</h5>
                            <p class="card-text" style="min-height: 60px;">{{mb_strimwidth($inst['resumo'], 0, 73, "...")}}</p>
                            <a href="{{route('instituicao',['id'=>$inst['id']])}}" class="btn font-weight-bold text-uppercase btn-success w-100">Quero doar</a>
                            @if (array_key_exists($inst['id'],$favoritos))
                            <a href="{{route('favorito', ['id'=> $inst['id']])}}" class="btn font-weight-bold text-uppercase btn-info btn-sm rounded mt-2 w-100">REMOVER <i class="bi bi-star-fill"></i></a>
                            @else
                            <a href="{{route('favorito', ['id'=> $inst['id']])}}" class="btn font-weight-bold text-uppercase btn-outline-info btn-sm rounded mt-2 w-100">Add favoritos <i class="bi bi-star"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection