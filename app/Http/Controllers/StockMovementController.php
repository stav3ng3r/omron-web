<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStockMovementRequest;
use App\Http\Requests\UpdateStockMovementRequest;
use App\Repositories\StockMovementRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class StockMovementController extends AppBaseController
{
    /** @var  StockMovementRepository */
    private $stockMovementRepository;

    public function __construct(StockMovementRepository $stockMovementRepo)
    {
        $this->stockMovementRepository = $stockMovementRepo;
    }

    /**
     * Display a listing of the StockMovement.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->stockMovementRepository->pushCriteria(new RequestCriteria($request));
        $stockMovements = $this->stockMovementRepository->all();

        return view('stock_movements.index')
            ->with('stockMovements', $stockMovements);
    }

    /**
     * Show the form for creating a new StockMovement.
     *
     * @return Response
     */
    public function create()
    {
        return view('stock_movements.create');
    }

    /**
     * Store a newly created StockMovement in storage.
     *
     * @param CreateStockMovementRequest $request
     *
     * @return Response
     */
    public function store(CreateStockMovementRequest $request)
    {
        $input = $request->all();

        $stockMovement = $this->stockMovementRepository->create($input);

        Flash::success('Stock Movement saved successfully.');

        return redirect(route('stockMovements.index'));
    }

    /**
     * Display the specified StockMovement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stockMovement = $this->stockMovementRepository->findWithoutFail($id);

        if (empty($stockMovement)) {
            Flash::error('Stock Movement not found');

            return redirect(route('stockMovements.index'));
        }

        return view('stock_movements.show')->with('stockMovement', $stockMovement);
    }

    /**
     * Show the form for editing the specified StockMovement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stockMovement = $this->stockMovementRepository->findWithoutFail($id);

        if (empty($stockMovement)) {
            Flash::error('Stock Movement not found');

            return redirect(route('stockMovements.index'));
        }

        return view('stock_movements.edit')->with('stockMovement', $stockMovement);
    }

    /**
     * Update the specified StockMovement in storage.
     *
     * @param  int              $id
     * @param UpdateStockMovementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStockMovementRequest $request)
    {
        $stockMovement = $this->stockMovementRepository->findWithoutFail($id);

        if (empty($stockMovement)) {
            Flash::error('Stock Movement not found');

            return redirect(route('stockMovements.index'));
        }

        $stockMovement = $this->stockMovementRepository->update($request->all(), $id);

        Flash::success('Stock Movement updated successfully.');

        return redirect(route('stockMovements.index'));
    }

    /**
     * Remove the specified StockMovement from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stockMovement = $this->stockMovementRepository->findWithoutFail($id);

        if (empty($stockMovement)) {
            Flash::error('Stock Movement not found');

            return redirect(route('stockMovements.index'));
        }

        $this->stockMovementRepository->delete($id);

        Flash::success('Stock Movement deleted successfully.');

        return redirect(route('stockMovements.index'));
    }
}
