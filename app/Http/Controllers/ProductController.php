<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductAccessory;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use App\Models\ProductType;
use App\Repositories\ProductRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->productRepository->pushCriteria(new RequestCriteria($request));
        $products = $this->productRepository->with('product_type', 'product_category', 'product_brand')
            ->paginate(30);


        return view('products.index')->with(compact('products'));
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {

        $brands = ProductBrand::all()->pluck('descripcion', 'id');
        $categories = ProductCategory::all()->pluck('descripcion', 'id');
        $types = ProductType::all()->pluck('descripcion', 'id');

        return view('products.create', compact('brands', 'categories', 'types'));
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();

        if (!empty($input['path_imagen']) OR !empty($input['imagen']))
            $input['tiene_imagen'] = TRUE;

        $product = $this->productRepository->create($input);

        Flash::success('Producto guardado exitosamente.');
        Flash::important();

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->with(['details', 'accessories'])->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Producto no encontrado.');

            return redirect(route('products.index'));
        }

        $productsList = Product::all()->pluck('nombre', 'id');

        $productDetails = $product->details;
        $productAccessories = $product->accessories;

        return view('products.show')->with(compact('productDetails', 'product', 'productAccessories', 'productsList'));
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Producto no encontrado.');

            return redirect(route('products.index'));
        }

        $brands = ProductBrand::all()->pluck('descripcion', 'id');
        $categories = ProductCategory::all()->pluck('descripcion', 'id');
        $types = ProductType::all()->pluck('descripcion', 'id');

        return view('products.edit')->with(compact('product', 'brands', 'types', 'categories'));
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Producto no encontrado.');

            return redirect(route('products.index'));
        }

        $product = $this->productRepository->update($request->all(), $id);

        Flash::success('Producto guardado exitosamente.');
        Flash::important();

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Producto no encontrado.');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product eliminado exitosamente.');
        Flash::important();

        return redirect(route('products.index'));
    }
}
