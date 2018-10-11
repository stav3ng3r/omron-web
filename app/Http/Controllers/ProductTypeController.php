<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductTypeRequest;
use App\Http\Requests\UpdateProductTypeRequest;
use App\Models\ProductCategory;
use App\Repositories\ProductTypeRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductTypeController extends AppBaseController
{
    /** @var  ProductTypeRepository */
    private $productTypeRepository;

    public function __construct(ProductTypeRepository $productTypeRepo)
    {
        $this->productTypeRepository = $productTypeRepo;
    }

    /**
     * Display a listing of the ProductType.
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->productTypeRepository->pushCriteria(new RequestCriteria($request));
        $productTypes = $this->productTypeRepository->paginate(30);

        return view('product_types.index')
            ->with('productTypes', $productTypes);
    }

    /**
     * Show the form for creating a new ProductType.
     *
     * @return Response
     */
    public function create()
    {
        $categories = ProductCategory::all()->pluck('descripcion', 'id');

        return view('product_types.create', compact('categories'));
    }

    /**
     * Store a newly created ProductType in storage.
     *
     * @param CreateProductTypeRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateProductTypeRequest $request)
    {
        $input = $request->all();

        $productType = $this->productTypeRepository->create($input);

        Flash::success('Tipo guradado exitosamente');
        Flash::important();

        return redirect(route('productTypes.index'));
    }

    /**
     * Display the specified ProductType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productType = $this->productTypeRepository->findWithoutFail($id);

        if (empty($productType)) {
            Flash::error('Tipo no encontrado.');

            return redirect(route('productTypes.index'));
        }

        return view('product_types.show')->with('productType', $productType);
    }

    /**
     * Show the form for editing the specified ProductType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productType = $this->productTypeRepository->findWithoutFail($id);

        if (empty($productType)) {
            Flash::error('Tipo no encontrado.');

            return redirect(route('productTypes.index'));
        }

        $categories = ProductCategory::all()->pluck('descripcion', 'id');

        return view('product_types.edit')->with(compact('categories', 'productType'));
    }

    /**
     * Update the specified ProductType in storage.
     *
     * @param  int $id
     * @param UpdateProductTypeRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateProductTypeRequest $request)
    {
        $productType = $this->productTypeRepository->findWithoutFail($id);

        if (empty($productType)) {
            Flash::error('Tipo no encontrado.');

            return redirect(route('productTypes.index'));
        }

        $productType = $this->productTypeRepository->update($request->all(), $id);

        Flash::success('Tipo actualizado exitosamente.');
        Flash::important();

        return redirect(route('productTypes.index'));
    }

    /**
     * Remove the specified ProductType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productType = $this->productTypeRepository->findWithoutFail($id);

        if (empty($productType)) {
            Flash::error('Tipo no encontrado.');

            return redirect(route('productTypes.index'));
        }

        $this->productTypeRepository->delete($id);

        Flash::success('Tipo eliminado exitosamente.');
        Flash::important();

        return redirect(route('productTypes.index'));
    }
}
