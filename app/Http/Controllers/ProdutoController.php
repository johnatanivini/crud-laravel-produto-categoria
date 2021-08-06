<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Repositories\ProdutoRepositoryInterface;
use Illuminate\Http\Request;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ProdutoController extends Controller
{
    public function __construct(
        protected ProdutoRepositoryInterface $produtoRepositoryInterface
    )
    {
    }

    public function index()
    {
        $produtos = $this->produtoRepositoryInterface->all();

        view('produto.index', [
            'produtos' => $produtos
        ]);
    }

    public function form(int $id)
    {
        $produtos = $this->produtoRepositoryInterface->find($id);

        view('produto.index', [
            'produtos' => $produtos
        ]);
    }

    public function delete(int $id)
    {
        $removerProduto = $this->produtoRepositoryInterface->delete($id);

        if (!$removerProduto) {
            redirect('index')->with('error', 'Não foi possivel remover o produto');
        }

        redirect('index')->with('msg', 'Registro removido');
    }

    public function create(ProdutoRequest $produtoRequest)
    {

        $produto = $this->produtoRepositoryInterface->create($produtoRequest->attributes());

        if ($produto) {
            redirect('index')->withErrors($produtoRequest->validated());
        }

        redirect('index')->with('success', 'Produto Cadastrado');
    }

    public function update($id, ProdutoRequest $produtoRequest)
    {

        $produto = $this->produtoRepositoryInterface->update($id, $produtoRequest->attributes());

        if ($produto) {
            redirect('index')->withErrors($produtoRequest->validated());
        }

        redirect('index')->with('success', 'Produto Cadastrado');
    }
}
