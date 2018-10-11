<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductImageRequest;
use App\Http\Requests\UpdateProductImageRequest;
use App\Repositories\ProductImageRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductImageController extends AppBaseController
{
    /** @var  ProductImageRepository */
    private $productImageRepository;
    /** @var ProductRepository */
    private $productRepository;

    public function __construct(ProductImageRepository $productImageRepo, ProductRepository $productRepo)
    {
        $this->productImageRepository = $productImageRepo;
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the ProductImage.
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->productImageRepository->pushCriteria(new RequestCriteria($request));
        $productImages = $this->productImageRepository->all();

        return view('product_images.index')
            ->with('productImages', $productImages);
    }

    /**
     * Show the form for creating a new ProductImage.
     *
     * @return Response
     */
    public function create()
    {
        return view('product_images.create');
    }

    /**
     * Store a newly created ProductImage in storage.
     *
     * @param $product
     * @param CreateProductImageRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store($product, CreateProductImageRequest $request)
    {

        $product = $this->productRepository->with('details')->findWithoutFail($product);

        if (empty($product)) {
            Flash::error('Producto no encontrado.');

            return redirect(route('products.index'));
        }

        $input = [
            'id_producto' => $product->id,
            'url_imagen'  => $request->get('image_url'),
            'codigo'      => $product->codigo
        ];

        $productImage = $this->productImageRepository->create($input);

        Flash::success('Imagen guardada exitosamente');
        Flash::important();

        return redirect(route('products.show', $product->id));
    }

    /**
     * Display the specified ProductImage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productImage = $this->productImageRepository->findWithoutFail($id);

        if (empty($productImage)) {
            Flash::error('Product Image not found');

            return redirect(route('productImages.index'));
        }

        return view('product_images.show')->with('productImage', $productImage);
    }

    /**
     * Show the form for editing the specified ProductImage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productImage = $this->productImageRepository->findWithoutFail($id);

        if (empty($productImage)) {
            Flash::error('Product Image not found');

            return redirect(route('productImages.index'));
        }

        return view('product_images.edit')->with('productImage', $productImage);
    }

    /**
     * Update the specified ProductImage in storage.
     *
     * @param  int $id
     * @param UpdateProductImageRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateProductImageRequest $request)
    {
        $productImage = $this->productImageRepository->findWithoutFail($id);

        if (empty($productImage)) {
            Flash::error('Product Image not found');

            return redirect(route('productImages.index'));
        }

        $productImage = $this->productImageRepository->update($request->all(), $id);

        Flash::success('Product Image updated successfully.');

        return redirect(route('productImages.index'));
    }

    /**
     * Remove the specified ProductImage from storage.
     *
     * @param $product
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($product, $id)
    {

        $product = $this->productRepository->findWithoutFail($product);

        if (empty($product)) {
            Flash::error('Producto no encontrado.');

            return redirect(route('products.index'));
        }

        $productImage = $this->productImageRepository->findWithoutFail($id);

        if (empty($productImage)) {
            Flash::error('Imagen no encontrada');

            return redirect(route('products.show', $product->id));
        }

        $this->productImageRepository->delete($id);

        Flash::success('Imagen eliminada exitosamente');
        Flash::important();

        return redirect(route('products.show', $product->id));
    }
}
