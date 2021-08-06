<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use App\Repositories\Eloquent\CategoriaProdutoRepository;
use App\Repositories\ProdutoRepositoryInterface;
use Exception;
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

    public function save(int $id = null, ProdutoRequest $produtoRequest)
    {
            $validated = $produtoRequest->validated();
            
        if (!$validated) {
            return redirect()->route('categoria.create', ['id' => $id])
            ->withErrors($validated);
        }

        if ($id) {
            $this->produtoRepositoryInterface
            ->update($id, request()->except('_token', '_method'));
        }

        if (!$id) {
            $this->produtoRepositoryInterface
            ->create(request()->except('_token', '_method'));
        }

        return redirect()->route('produto.listar')->with('success', 'Produto salvo');

    }
}
