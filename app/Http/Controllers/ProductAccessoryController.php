<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductAccessoryRequest;
use App\Http\Requests\UpdateProductAccessoryRequest;
use App\Models\Product;
use App\Models\ProductAccessory;
use App\Repositories\ProductAccessoryRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductAccessoryController extends AppBaseController
{
    /** @var  ProductAccessoryRepository */
    private $productAccessoryRepository;
    /** @var ProductRepository */
    private $productRepository;

    public function __construct(ProductAccessoryRepository $productAccessoryRepo, ProductRepository $productRepo)
    {
        $this->productAccessoryRepository = $productAccessoryRepo;
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the ProductAccessory.
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->productAccessoryRepository->pushCriteria(new RequestCriteria($request));
        $productAccessories = $this->productAccessoryRepository->all();

        return view('product_accessories.index')
            ->with('productAccessories', $productAccessories);
    }

    /**
     * Show the form for creating a new ProductAccessory.
     *
     * @return Response
     */
    public function create()
    {
        return view('product_accessories.create');
    }

    /**
     * Store a newly created ProductAccessory in storage.
     *
     * @param $product
     * @param CreateProductAccessoryRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store($product, CreateProductAccessoryRequest $request)
    {

        $product = $this->productRepository->with('details')->findWithoutFail($product);

        if (empty($product)) {
            Flash::error('Producto no encontrado.');

            return redirect(route('products.index'));
        }

        $input = $request->all();

        $accessories = Product::whereIn('id', $input['accessories_list'])->get();

        if (!$accessories OR $accessories->isEmpty()) {
            Flash::error('Accesorios no encontrados.');

            return redirect(route('products.show', $product->id));
        }

        foreach ($accessories as $accessory) {

            $data = [
                'codigo_producto_principal' => $product->codigo,
                'codigo_producto_accesorio' => $accessory->codigo,
                'id_producto'               => $product->id,
                'id_accesorio'              => $accessory->id
            ];

            $productAccessory = $this->productAccessoryRepository->create($data);
        }


        Flash::success('Accesorios guardados exitosamente');
        Flash::important();

        return redirect(route('products.show', $product->id));
    }

    /**
     * Display the specified ProductAccessory.
     *
     * @param $product
     * @param  int $id
     *
     * @return Response
     */
    public function show($product, $id)
    {
        $product = $this->productRepository->with('details')->findWithoutFail($product);

        if (empty($product)) {
            Flash::error('Producto no encontrado.');

            return redirect(route('products.index'));
        }

        $productAccessory = $this->productAccessoryRepository->findWithoutFail($id);

        if (empty($productAccessory)) {
            Flash::error('Accesorio no encontrado');

            return redirect(route('products.show', $product->id));
        }

        return redirect(route('products.show', $productAccessory->id_accesorio));
    }

    /**
     * Show the form for editing the specified ProductAccessory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productAccessory = $this->productAccessoryRepository->findWithoutFail($id);

        if (empty($productAccessory)) {
            Flash::error('Product Accessory not found');

            return redirect(route('productAccessories.index'));
        }

        return view('product_accessories.edit')->with('productAccessory', $productAccessory);
    }

    /**
     * Update the specified ProductAccessory in storage.
     *
     * @param  int $id
     * @param UpdateProductAccessoryRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateProductAccessoryRequest $request)
    {
        $productAccessory = $this->productAccessoryRepository->findWithoutFail($id);

        if (empty($productAccessory)) {
            Flash::error('Product Accessory not found');

            return redirect(route('productAccessories.index'));
        }

        $productAccessory = $this->productAccessoryRepository->update($request->all(), $id);

        Flash::success('Product Accessory updated successfully.');

        return redirect(route('productAccessories.index'));
    }

    /**
     * Remove the specified ProductAccessory from storage.
     *
     * @param $product
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

        $productAccessory = $this->productAccessoryRepository->findWithoutFail($id);

        if (empty($productAccessory)) {
            Flash::error('Accesorio no encontrado');

            return redirect(route('products.show', $product->id));
        }

        $this->productAccessoryRepository->delete($id);

        Flash::success('Accesorio eliminado exitosamente.');
        Flash::important();

        return redirect(route('products.show', $product->id));
    }
}
