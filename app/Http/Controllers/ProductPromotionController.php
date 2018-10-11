<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductPromotionRequest;
use App\Http\Requests\UpdateProductPromotionRequest;
use App\Models\Distributor;
use App\Models\Product;
use App\Models\ProductPromotion;
use App\Repositories\ProductPromotionRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductPromotionController extends AppBaseController
{
    /** @var  ProductPromotionRepository */
    private $productPromotionRepository;

    public function __construct(ProductPromotionRepository $productPromotionRepo)
    {
        $this->productPromotionRepository = $productPromotionRepo;
    }

    /**
     * Display a listing of the ProductPromotion.
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->productPromotionRepository->pushCriteria(new RequestCriteria($request));
        $productPromotions = $this->productPromotionRepository->with(['product', 'distributor'])
            ->paginate(30);

        return view('product_promotions.index')
            ->with('productPromotions', $productPromotions);
    }

    /**
     * Show the form for creating a new ProductPromotion.
     *
     * @return Response
     */
    public function create()
    {

        $products = Product::all()->pluck('nombre', 'id');
        $distributors = Distributor::all()->pluck('titulo', 'id');
        $productPromotion = new ProductPromotion();

        return view('product_promotions.create', compact('products', 'distributors', 'productPromotion'));
    }

    /**
     * Store a newly created ProductPromotion in storage.
     *
     * @param CreateProductPromotionRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateProductPromotionRequest $request)
    {
        $input = $request->all();

        $productPromotion = $this->productPromotionRepository->create($input);

        Flash::success('Promocion guardad exitosamente');
        Flash::important();

        return redirect(route('productPromotions.index'));
    }

    /**
     * Display the specified ProductPromotion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productPromotion = $this->productPromotionRepository->findWithoutFail($id);

        if (empty($productPromotion)) {
            Flash::error('Promocion no encontrada.');

            return redirect(route('productPromotions.index'));
        }

        return view('product_promotions.show')->with('productPromotion', $productPromotion);
    }

    /**
     * Show the form for editing the specified ProductPromotion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productPromotion = $this->productPromotionRepository->findWithoutFail($id);

        if (empty($productPromotion)) {
            Flash::error('Promocion no encontrada.');

            return redirect(route('productPromotions.index'));
        }

        $products = Product::all()->pluck('nombre', 'id');
        $distributors = Distributor::all()->pluck('titulo', 'id');

        return view('product_promotions.edit')->with(compact('productPromotion', 'products', 'distributors'));
    }

    /**
     * Update the specified ProductPromotion in storage.
     *
     * @param  int $id
     * @param UpdateProductPromotionRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateProductPromotionRequest $request)
    {
        $productPromotion = $this->productPromotionRepository->findWithoutFail($id);

        if (empty($productPromotion)) {
            Flash::error('Promocion no encontrada.');

            return redirect(route('productPromotions.index'));
        }

        $productPromotion = $this->productPromotionRepository->update($request->all(), $id);

        Flash::success('Product Promotion updated successfully.');

        return redirect(route('productPromotions.index'));
    }

    /**
     * Remove the specified ProductPromotion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productPromotion = $this->productPromotionRepository->findWithoutFail($id);

        if (empty($productPromotion)) {
            Flash::error('Promocion no encontrada.');

            return redirect(route('productPromotions.index'));
        }

        $this->productPromotionRepository->delete($id);

        Flash::success('Product Promotion deleted successfully.');

        return redirect(route('productPromotions.index'));
    }
}
