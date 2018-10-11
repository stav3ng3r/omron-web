<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductDetailRequest;
use App\Http\Requests\UpdateProductDetailRequest;
use App\Repositories\ProductDetailRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductDetailController extends AppBaseController
{
    /** @var  ProductDetailRepository */
    private $productDetailRepository;

    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductDetailRepository $productDetailRepo, ProductRepository $productRepo)
    {
        $this->productDetailRepository = $productDetailRepo;
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the ProductDetail.
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->productDetailRepository->pushCriteria(new RequestCriteria($request));
        $productDetails = $this->productDetailRepository->all();

        return view('product_details.index')
            ->with('productDetails', $productDetails);
    }

    /**
     * Show the form for creating a new ProductDetail.
     *
     * @param $product
     * @return Response
     */
    public function create($product)
    {
        $product = $this->productRepository->with('details')->findWithoutFail($product);

        if (empty($product)) {
            Flash::error('Producto no encontrado.');

            return redirect(route('products.index'));
        }

        return view('product_details.create', compact('product'));
    }

    /**
     * Store a newly created ProductDetail in storage.
     *
     * @param $product
     * @param CreateProductDetailRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store($product, CreateProductDetailRequest $request)
    {
        $input = $request->all();

        $product = $this->productRepository->with('details')->findWithoutFail($product);

        if (empty($product)) {
            Flash::error('Producto no encontrado.');

            return redirect(route('products.index'));
        }

        $input['id_producto'] = $product->id;
        $input['codigo'] = $product->codigo;

        $productDetail = $this->productDetailRepository->create($input);

        Flash::success('Detalle guardado exitosamente');
        Flash::important();

        return redirect(route('products.show', [$product->id]));
    }

//    /**
//     * Display the specified ProductDetail.
//     *
//     * @param  int $id
//     *
//     * @return Response
//     */
//    public function show($id)
//    {
//        $productDetail = $this->productDetailRepository->findWithoutFail($id);
//
//        if (empty($productDetail)) {
//            Flash::error('Detalle no encontrado.');
//
//            return redirect(route('products.show', [$product->id]));
//        }
//
//        return view('product_details.show')->with('productDetail', $productDetail);
//    }

    /**
     * Show the form for editing the specified ProductDetail.
     *
     * @param $product
     * @param  int $id
     *
     * @return Response
     */
    public function edit($product, $id)
    {
        $product = $this->productRepository->with('details')->findWithoutFail($product);

        if (empty($product)) {
            Flash::error('Producto no encontrado.');

            return redirect(route('products.index'));
        }

        $productDetail = $this->productDetailRepository->findWithoutFail($id);

        if (empty($productDetail)) {
            Flash::error('Detalle no encontrado.');

            return redirect(route('products.show', [$product->id]));
        }

        return view('product_details.edit')->with(compact('product', 'productDetail'));
    }

    /**
     * Update the specified ProductDetail in storage.
     *
     * @param $product
     * @param  int $id
     * @param UpdateProductDetailRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($product, $id, UpdateProductDetailRequest $request)
    {
        $product = $this->productRepository->with('details')->findWithoutFail($product);

        if (empty($product)) {
            Flash::error('Producto no encontrado.');

            return redirect(route('products.index'));
        }

        $productDetail = $this->productDetailRepository->findWithoutFail($id);

        if (empty($productDetail)) {
            Flash::error('Detalle no encontrado.');

            return redirect(route('products.show', [$product->id]));
        }

        $input['id_producto'] = $product->id;
        $input['codigo'] = $product->codigo;

        $productDetail = $this->productDetailRepository->update($request->all(), $id);

        Flash::success('Detalle guardado exitosamente');
        Flash::important();

        return redirect(route('products.show', [$product->id]));
    }

    /**
     * Remove the specified ProductDetail from storage.
     *
     * @param int $product
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($product, $id)
    {
        $product = $this->productRepository->with('details')->findWithoutFail($product);

        if (empty($product)) {
            Flash::error('Producto no encontrado.');

            return redirect(route('products.index'));
        }

        $productDetail = $this->productDetailRepository->findWithoutFail($id);

        if (empty($productDetail)) {
            Flash::error('Detalle no encontrado.');

            return redirect(route('products.show', [$product->id]));
        }

        $this->productDetailRepository->delete($id);

        Flash::success('Detalle eliminado exitosamente');
        Flash::important();

        return redirect(route('products.show', [$product->id]));
    }
}
