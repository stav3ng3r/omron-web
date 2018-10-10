<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Models\ProductBrand;
use App\Repositories\ProductCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductCategoryController extends AppBaseController
{
    /** @var  ProductCategoryRepository */
    private $productCategoryRepository;

    public function __construct(ProductCategoryRepository $productCategoryRepo)
    {
        $this->productCategoryRepository = $productCategoryRepo;
    }

    /**
     * Display a listing of the ProductCategory.
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->productCategoryRepository->pushCriteria(new RequestCriteria($request));
        $productCategories = $this->productCategoryRepository->with('brand')->all();

        return view('product_categories.index')
            ->with('productCategories', $productCategories);
    }

    /**
     * Show the form for creating a new ProductCategory.
     *
     * @return Response
     */
    public function create()
    {
        $brands = ProductBrand::all()->pluck('descripcion', 'id');

        return view('product_categories.create', compact('brands'));
    }

    /**
     * Store a newly created ProductCategory in storage.
     *
     * @param CreateProductCategoryRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateProductCategoryRequest $request)
    {
        $input = $request->all();

        $productCategory = $this->productCategoryRepository->create($input);

        Flash::success('Categoria guardado exitosamente.');
        Flash::important();

        return redirect(route('productCategories.index'));
    }

    /**
     * Display the specified ProductCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productCategory = $this->productCategoryRepository->findWithoutFail($id);

        if (empty($productCategory)) {
            Flash::error('Categoria no encontrada');

            return redirect(route('productCategories.index'));
        }

        return view('product_categories.show')->with('productCategory', $productCategory);
    }

    /**
     * Show the form for editing the specified ProductCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productCategory = $this->productCategoryRepository->findWithoutFail($id);

        if (empty($productCategory)) {
            Flash::error('Categoria no encontrada');

            return redirect(route('productCategories.index'));
        }

        $brands = ProductBrand::all()->pluck('descripcion', 'id');

        return view('product_categories.edit')->with(compact('productCategory', 'brands'));
    }

    /**
     * Update the specified ProductCategory in storage.
     *
     * @param  int $id
     * @param UpdateProductCategoryRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateProductCategoryRequest $request)
    {
        $productCategory = $this->productCategoryRepository->findWithoutFail($id);

        if (empty($productCategory)) {
            Flash::error('Categoria no encontrada');

            return redirect(route('productCategories.index'));
        }

        $productCategory = $this->productCategoryRepository->update($request->all(), $id);

        Flash::success('Categoria actualizada exitosamente.');
        Flash::important();

        return redirect(route('productCategories.index'));
    }

    /**
     * Remove the specified ProductCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productCategory = $this->productCategoryRepository->findWithoutFail($id);

        if (empty($productCategory)) {
            Flash::error('Categoria no encontrada');

            return redirect(route('productCategories.index'));
        }

        $this->productCategoryRepository->delete($id);

        Flash::success('Categoria eliminada exitosamente.');
        Flash::important();

        return redirect(route('productCategories.index'));
    }
}
