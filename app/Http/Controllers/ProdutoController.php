<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use App\Repositories\Eloquent\CategoriaProdutoRepository;
use App\Repositories\ProdutoRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ProdutoController extends Controller
{
    public function __construct(
        protected ProdutoRepositoryInterface $produtoRepositoryInterface,
        protected CategoriaProdutoRepository $categoriaProdutoRepository
    )
    {
    }

    public function index()
    {
        $produtos = $this->produtoRepositoryInterface->all();

        return view('produto.index', [
            'produtos' => $produtos
        ]);
    }

    public function create(int $id = null)
    {
        $produto = new Produto();

        if ($id) {

            $produto = $this->produtoRepositoryInterface->find($id);
        }

        
        return view('produto.create', [
            'produto' => $produto,
            'categorias' => $this->categoriaProdutoRepository->all()
        ]);
    }

    public function delete(int $id)
    {
        $removerProduto = $this->produtoRepositoryInterface->delete($id);
       
        if (!$removerProduto) {
            return redirect()->route('produto.listar')->with('error', 'Produto não foi removido!');
        }

        return redirect()->route('produto.listar')->with('success', 'Produto removido!');
    }

    public function save(ProdutoRequest $produtoRequest)
    {

        $produto = $this->produtoRepositoryInterface->create($produtoRequest->attributes());

        if ($produto) {
            redirect('produto.create')->withErrors($produtoRequest);
        }

        redirect()->route('produto.listar')->with('success', 'Produto Cadastrado');
    }

    public function update($id, ProdutoRequest $produtoRequest)
    {
        $produto = $this->produtoRepositoryInterface->update($id, $produtoRequest->attributes());

        if ($produto) {
            redirect('produto.create')->withErrors($produtoRequest);
        }

        redirect()->route('produto.listar')->with('success', 'Produto Atualizado');
    }
}
