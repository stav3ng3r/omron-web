<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDistributorMultiplierRequest;
use App\Http\Requests\UpdateDistributorMultiplierRequest;
use App\Repositories\DistributorMultiplierRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DistributorMultiplierController extends AppBaseController
{
    /** @var  DistributorMultiplierRepository */
    private $distributorMultiplierRepository;

    public function __construct(DistributorMultiplierRepository $distributorMultiplierRepo)
    {
        $this->distributorMultiplierRepository = $distributorMultiplierRepo;
    }

    /**
     * Display a listing of the DistributorMultiplier.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->distributorMultiplierRepository->pushCriteria(new RequestCriteria($request));
        $distributorMultipliers = $this->distributorMultiplierRepository->all();

        return view('distributor_multipliers.index')
            ->with('distributorMultipliers', $distributorMultipliers);
    }

    /**
     * Show the form for creating a new DistributorMultiplier.
     *
     * @return Response
     */
    public function create()
    {
        return view('distributor_multipliers.create');
    }

    /**
     * Store a newly created DistributorMultiplier in storage.
     *
     * @param CreateDistributorMultiplierRequest $request
     *
     * @return Response
     */
    public function store(CreateDistributorMultiplierRequest $request)
    {
        $input = $request->all();

        $distributorMultiplier = $this->distributorMultiplierRepository->create($input);

        Flash::success('Distributor Multiplier saved successfully.');

        return redirect(route('distributorMultipliers.index'));
    }

    /**
     * Display the specified DistributorMultiplier.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $distributorMultiplier = $this->distributorMultiplierRepository->findWithoutFail($id);

        if (empty($distributorMultiplier)) {
            Flash::error('Distributor Multiplier not found');

            return redirect(route('distributorMultipliers.index'));
        }

        return view('distributor_multipliers.show')->with('distributorMultiplier', $distributorMultiplier);
    }

    /**
     * Show the form for editing the specified DistributorMultiplier.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $distributorMultiplier = $this->distributorMultiplierRepository->findWithoutFail($id);

        if (empty($distributorMultiplier)) {
            Flash::error('Distributor Multiplier not found');

            return redirect(route('distributorMultipliers.index'));
        }

        return view('distributor_multipliers.edit')->with('distributorMultiplier', $distributorMultiplier);
    }

    /**
     * Update the specified DistributorMultiplier in storage.
     *
     * @param  int              $id
     * @param UpdateDistributorMultiplierRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDistributorMultiplierRequest $request)
    {
        $distributorMultiplier = $this->distributorMultiplierRepository->findWithoutFail($id);

        if (empty($distributorMultiplier)) {
            Flash::error('Distributor Multiplier not found');

            return redirect(route('distributorMultipliers.index'));
        }

        $distributorMultiplier = $this->distributorMultiplierRepository->update($request->all(), $id);

        Flash::success('Distributor Multiplier updated successfully.');

        return redirect(route('distributorMultipliers.index'));
    }

    /**
     * Remove the specified DistributorMultiplier from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $distributorMultiplier = $this->distributorMultiplierRepository->findWithoutFail($id);

        if (empty($distributorMultiplier)) {
            Flash::error('Distributor Multiplier not found');

            return redirect(route('distributorMultipliers.index'));
        }

        $this->distributorMultiplierRepository->delete($id);

        Flash::success('Distributor Multiplier deleted successfully.');

        return redirect(route('distributorMultipliers.index'));
    }
}
