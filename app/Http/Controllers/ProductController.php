<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoValidator;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;


class ProductController extends Controller
{
    public function index(ProductRepository $productRepository, Request $request)
    {
        return $productRepository->listAll($request);
    }

    public function findAllProductByCategory($id, ProductRepository $productRepository){
        return $productRepository->findAllProductByCategory($id);
    }

    public function store(StoreProdutoValidator $request, ProductRepository $productRepository)
    {
        return $productRepository->store($request);
    }

    public function show($id, ProductRepository $productRepository)
    {
       return $productRepository->show($id);
    }

    public function update(StoreProdutoValidator $request, $id, ProductRepository $productRepository)
    {
        return $productRepository->update($request, $id);
    }

    public function destroy($id, ProductRepository $productRepository)
    {
        return $productRepository->destroy($id);
    }

    public function findLucroByProduto($id, ProductRepository $productRepository){
        return $productRepository->findLucroByProduto($id);
    }

    public function search(Request $request, ProductRepository $productRepository){
        return $productRepository->search($request);
    }

    public function descontaQuantidadeMaterial($id, $quantidade, ProductRepository $productRepository){
        return $productRepository->descontaQuantidadeMaterial($id, $quantidade);
    }
    public function countProducts(ProductRepository $productRepository){
        return $productRepository->countProducts();
    }
}
