@extends('Layouts.template')
@section('titulo', 'Home - Seja bem vindo')


@section('conteudo')

<section>
    <div class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('assets/imagens/banners/banner_1.jpg')}}" class="d-block w-100" alt="Banner 1">
            </div>
        </div>
    </div>
</section>

<section id="comoFunciona">
    <div class="container">
        <div class="row py-5 text-center">
            <div class="col-12">
                <h2 class="font-weight-bold">COMO FUNCIONA</h2>
                <p class="mb-5 text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing, elit. Similique placeat ullam iste quas.
                </p>
            </div>
            <div class="col-md-4">
                <h3 class="mb-4"><span class="btn-primary rounded px-1 px-3">1</span> Passo</h3>
                <p>
                    Escolha a instituição que deseja doar.
                </p>
            </div>
            <div class="col-md-4">
                <h3 class="mb-4"><span class="btn-primary rounded px-1 px-3">2</span> Passo</h3>
                <p>
                    Faça seu login ou crie sua conta.
                </p>
            </div>
            <div class="col-md-4">
                <h3 class="mb-4"><span class="btn-primary rounded px-1 px-3">3</span> Passo</h3>
                <p>
                    Pronto, você ajudou muitas pessoas!
                </p>
            </div>
        </div>
    </div>
</section>

<section class="bg-primary">
    <div class="container">
        <div class="row py-5">
            <div class="col-12 text-white text-center">
                <h2 class="font-weight-bold text-uppercase">Algumas instituições</h2>
                <p class="mb-5">
                    Lorem ipsum dolor sit amet consectetur adipisicing, elit. Similique placeat ullam iste quas
                </p>
            </div>
            <div class="col-12">
                <div class="carrossel-instituicao">
                    @foreach($instituicoes as $inst)
                    <div class="p-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="w-100 text-center mb-4">
                                    <i class="bi bi-bookmark-heart text-primary" style="font-size: 3rem;"></i>
                                </div>
                                <h5 class="card-title text-center text-uppercase">{{$inst['nome']}}</h5>
                                <p class="card-text" style="min-height: 60px;">{{mb_strimwidth($inst['resumo'], 0, 73, "...")}}</p>
                                <p>
                                    <i>Total arrecadado:</i> R$ <span class="valor font-weight-bold">{{number_format($inst->doacoes->sum('valor'),2,",",".")}}</span>
                                </p>
                                <a href="{{route('instituicao',['id'=>$inst['id']])}}" class="btn btn-success w-100">Quero doar</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-4 text-center">
                    <a class="btn btn-outline-light rounded-pill font-weight-bold" href="{{route('todas_insts')}}">Ver todas</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection