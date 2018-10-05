<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductAccessoryRequest;
use App\Http\Requests\UpdateProductAccessoryRequest;
use App\Repositories\ProductAccessoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductAccessoryController extends AppBaseController
{
    /** @var  ProductAccessoryRepository */
    private $productAccessoryRepository;

    public function __construct(ProductAccessoryRepository $productAccessoryRepo)
    {
        $this->productAccessoryRepository = $productAccessoryRepo;
    }

    /**
     * Display a listing of the ProductAccessory.
     *
     * @param Request $request
     * @return Response
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
     * @param CreateProductAccessoryRequest $request
     *
     * @return Response
     */
    public function store(CreateProductAccessoryRequest $request)
    {
        $input = $request->all();

        $productAccessory = $this->productAccessoryRepository->create($input);

        Flash::success('Product Accessory saved successfully.');

        return redirect(route('productAccessories.index'));
    }

    /**
     * Display the specified ProductAccessory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productAccessory = $this->productAccessoryRepository->findWithoutFail($id);

        if (empty($productAccessory)) {
            Flash::error('Product Accessory not found');

            return redirect(route('productAccessories.index'));
        }

        return view('product_accessories.show')->with('productAccessory', $productAccessory);
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
     * @param  int              $id
     * @param UpdateProductAccessoryRequest $request
     *
     * @return Response
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
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productAccessory = $this->productAccessoryRepository->findWithoutFail($id);

        if (empty($productAccessory)) {
            Flash::error('Product Accessory not found');

            return redirect(route('productAccessories.index'));
        }

        $this->productAccessoryRepository->delete($id);

        Flash::success('Product Accessory deleted successfully.');

        return redirect(route('productAccessories.index'));
    }
}
