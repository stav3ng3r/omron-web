<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductBrandRequest;
use App\Http\Requests\UpdateProductBrandRequest;
use App\Repositories\ProductBrandRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductBrandController extends AppBaseController
{
    /** @var  ProductBrandRepository */
    private $productBrandRepository;

    public function __construct(ProductBrandRepository $productBrandRepo)
    {
        $this->productBrandRepository = $productBrandRepo;
    }

    /**
     * Display a listing of the ProductBrand.
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->productBrandRepository->pushCriteria(new RequestCriteria($request));
        $productBrands = $this->productBrandRepository->paginate(30);

        return view('product_brands.index')
            ->with('productBrands', $productBrands);
    }

    /**
     * Show the form for creating a new ProductBrand.
     *
     * @return Response
     */
    public function create()
    {
        return view('product_brands.create');
    }

    /**
     * Store a newly created ProductBrand in storage.
     *
     * @param CreateProductBrandRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateProductBrandRequest $request)
    {
        $input = $request->all();

        $productBrand = $this->productBrandRepository->create($input);

        Flash::success('Marca guardada exitosamente');
        Flash::important();

        return redirect(route('productBrands.index'));
    }

    /**
     * Display the specified ProductBrand.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productBrand = $this->productBrandRepository->findWithoutFail($id);

        if (empty($productBrand)) {
            Flash::error('Marca no encontrada.');

            return redirect(route('productBrands.index'));
        }

        return view('product_brands.show')->with('productBrand', $productBrand);
    }

    /**
     * Show the form for editing the specified ProductBrand.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productBrand = $this->productBrandRepository->findWithoutFail($id);

        if (empty($productBrand)) {
            Flash::error('Marca no encontrada.');

            return redirect(route('productBrands.index'));
        }

        return view('product_brands.edit')->with('productBrand', $productBrand);
    }

    /**
     * Update the specified ProductBrand in storage.
     *
     * @param  int $id
     * @param UpdateProductBrandRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateProductBrandRequest $request)
    {
        $productBrand = $this->productBrandRepository->findWithoutFail($id);

        if (empty($productBrand)) {
            Flash::error('Marca no encontrada.');

            return redirect(route('productBrands.index'));
        }

        $productBrand = $this->productBrandRepository->update($request->all(), $id);

        Flash::success('Marca actualizada exitosamente');
        Flash::important();

        return redirect(route('productBrands.index'));
    }

    /**
     * Remove the specified ProductBrand from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productBrand = $this->productBrandRepository->findWithoutFail($id);

        if (empty($productBrand)) {
            Flash::error('Marca no encontrada.');

            return redirect(route('productBrands.index'));
        }

        $this->productBrandRepository->delete($id);

        Flash::success('Marca eliminada exitosamente');
        Flash::important();

        return redirect(route('productBrands.index'));
    }
}
