<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductPromotionRequest;
use App\Http\Requests\UpdateProductPromotionRequest;
use App\Repositories\ProductPromotionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
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
     */
    public function index(Request $request)
    {
        $this->productPromotionRepository->pushCriteria(new RequestCriteria($request));
        $productPromotions = $this->productPromotionRepository->all();

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
        return view('product_promotions.create');
    }

    /**
     * Store a newly created ProductPromotion in storage.
     *
     * @param CreateProductPromotionRequest $request
     *
     * @return Response
     */
    public function store(CreateProductPromotionRequest $request)
    {
        $input = $request->all();

        $productPromotion = $this->productPromotionRepository->create($input);

        Flash::success('Product Promotion saved successfully.');

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
            Flash::error('Product Promotion not found');

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
            Flash::error('Product Promotion not found');

            return redirect(route('productPromotions.index'));
        }

        return view('product_promotions.edit')->with('productPromotion', $productPromotion);
    }

    /**
     * Update the specified ProductPromotion in storage.
     *
     * @param  int              $id
     * @param UpdateProductPromotionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductPromotionRequest $request)
    {
        $productPromotion = $this->productPromotionRepository->findWithoutFail($id);

        if (empty($productPromotion)) {
            Flash::error('Product Promotion not found');

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
            Flash::error('Product Promotion not found');

            return redirect(route('productPromotions.index'));
        }

        $this->productPromotionRepository->delete($id);

        Flash::success('Product Promotion deleted successfully.');

        return redirect(route('productPromotions.index'));
    }
}
