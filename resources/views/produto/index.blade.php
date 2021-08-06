@extends('templates.layout')
@section('conteudo')
<div class="d-flex justify-content-center">
    <a class="p-2 btn btn-primary" href="{{ route('home') }}">
        Home
    </a>
    <a class="p-2 btn btn-primary" href="{{ route('produto.create') }}">
        Cadastrar Produto
    </a>
</div>
<div class="d-flex flex-column justify-content-center">
    @foreach ($produtos as $produto)
        <div class="d-flex flex-row justify-content-center">
            <div class="p2">
                {{$produto->id_produto}}
            </div>
            <div class="p2">
                {{$produto->nome_produto}}
            </div>
            <div class="p2">
                {{$produto->valor_roduto}}
            </div>
            <div class="p2">
                {{$produto->data_cadastro->format('d-m-Y')}}
            </div>
            <div class="p2">
               <a href="{{ route('produto.editar', ['id'=>$produto->id_produto]) }}" class="btn btn-info">Editar</a>
               <a href="{{ route('produto.deletar', ['id'=>$produto->id_produto]) }}" class="btn btn-danger">Excluir</a>
            </div>
        </div>
    @endforeach
</div>
@endsection