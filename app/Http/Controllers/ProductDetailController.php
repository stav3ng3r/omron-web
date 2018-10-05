<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductDetailRequest;
use App\Http\Requests\UpdateProductDetailRequest;
use App\Repositories\ProductDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductDetailController extends AppBaseController
{
    /** @var  ProductDetailRepository */
    private $productDetailRepository;

    public function __construct(ProductDetailRepository $productDetailRepo)
    {
        $this->productDetailRepository = $productDetailRepo;
    }

    /**
     * Display a listing of the ProductDetail.
     *
     * @param Request $request
     * @return Response
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
     * @return Response
     */
    public function create()
    {
        return view('product_details.create');
    }

    /**
     * Store a newly created ProductDetail in storage.
     *
     * @param CreateProductDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateProductDetailRequest $request)
    {
        $input = $request->all();

        $productDetail = $this->productDetailRepository->create($input);

        Flash::success('Product Detail saved successfully.');

        return redirect(route('productDetails.index'));
    }

    /**
     * Display the specified ProductDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productDetail = $this->productDetailRepository->findWithoutFail($id);

        if (empty($productDetail)) {
            Flash::error('Product Detail not found');

            return redirect(route('productDetails.index'));
        }

        return view('product_details.show')->with('productDetail', $productDetail);
    }

    /**
     * Show the form for editing the specified ProductDetail.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productDetail = $this->productDetailRepository->findWithoutFail($id);

        if (empty($productDetail)) {
            Flash::error('Product Detail not found');

            return redirect(route('productDetails.index'));
        }

        return view('product_details.edit')->with('productDetail', $productDetail);
    }

    /**
     * Update the specified ProductDetail in storage.
     *
     * @param  int              $id
     * @param UpdateProductDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductDetailRequest $request)
    {
        $productDetail = $this->productDetailRepository->findWithoutFail($id);

        if (empty($productDetail)) {
            Flash::error('Product Detail not found');

            return redirect(route('productDetails.index'));
        }

        $productDetail = $this->productDetailRepository->update($request->all(), $id);

        Flash::success('Product Detail updated successfully.');

        return redirect(route('productDetails.index'));
    }

    /**
     * Remove the specified ProductDetail from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productDetail = $this->productDetailRepository->findWithoutFail($id);

        if (empty($productDetail)) {
            Flash::error('Product Detail not found');

            return redirect(route('productDetails.index'));
        }

        $this->productDetailRepository->delete($id);

        Flash::success('Product Detail deleted successfully.');

        return redirect(route('productDetails.index'));
    }
}
