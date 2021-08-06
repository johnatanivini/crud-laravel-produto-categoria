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
@include('../templates.alerta')
<table class="mt-5 table table-bordered">
    @foreach ($produtos as $produto)
        <tr class="bg-light">
            <td class="p2 mr2">
                {{$produto->id_produto}}
            </td>
            <td class="p2 mr-2">
                {{$produto->nome_produto}}
            </td>
            <td class="p2 mr-2">
                {{$produto->valor_roduto}}
            </td>
            <td class="p2 mr-2">
                {{$produto->data_cadastro->format('d-m-Y')}}
            </td>
            <td class="p2 m2" style="width:2%">
                <div class="d-flex flex-row">
                    <a href="/produto/{{$produto->id_produto}}" class="btn btn-info">Editar</a>

                    <form action="{{ route('produto.delete', ['id'=>$produto->id_produto]) }}" method="POST">
                        @csrf()
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Remover</button>
                    </form>
                </div>
            </td>
        </div>
        
    @endforeach
</table>
@endsection