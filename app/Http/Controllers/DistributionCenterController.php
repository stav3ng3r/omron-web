<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDistributionCenterRequest;
use App\Http\Requests\UpdateDistributionCenterRequest;
use App\Repositories\DistributionCenterRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DistributionCenterController extends AppBaseController
{
    /** @var  DistributionCenterRepository */
    private $distributionCenterRepository;

    public function __construct(DistributionCenterRepository $distributionCenterRepo)
    {
        $this->distributionCenterRepository = $distributionCenterRepo;
    }

    /**
     * Display a listing of the DistributionCenter.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->distributionCenterRepository->pushCriteria(new RequestCriteria($request));
        $distributionCenters = $this->distributionCenterRepository->all();

        return view('distribution_centers.index')
            ->with('distributionCenters', $distributionCenters);
    }

    /**
     * Show the form for creating a new DistributionCenter.
     *
     * @return Response
     */
    public function create()
    {
        return view('distribution_centers.create');
    }

    /**
     * Store a newly created DistributionCenter in storage.
     *
     * @param CreateDistributionCenterRequest $request
     *
     * @return Response
     */
    public function store(CreateDistributionCenterRequest $request)
    {
        $input = $request->all();

        $distributionCenter = $this->distributionCenterRepository->create($input);

        Flash::success('Distribution Center saved successfully.');

        return redirect(route('distributionCenters.index'));
    }

    /**
     * Display the specified DistributionCenter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $distributionCenter = $this->distributionCenterRepository->findWithoutFail($id);

        if (empty($distributionCenter)) {
            Flash::error('Distribution Center not found');

            return redirect(route('distributionCenters.index'));
        }

        return view('distribution_centers.show')->with('distributionCenter', $distributionCenter);
    }

    /**
     * Show the form for editing the specified DistributionCenter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $distributionCenter = $this->distributionCenterRepository->findWithoutFail($id);

        if (empty($distributionCenter)) {
            Flash::error('Distribution Center not found');

            return redirect(route('distributionCenters.index'));
        }

        return view('distribution_centers.edit')->with('distributionCenter', $distributionCenter);
    }

    /**
     * Update the specified DistributionCenter in storage.
     *
     * @param  int              $id
     * @param UpdateDistributionCenterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDistributionCenterRequest $request)
    {
        $distributionCenter = $this->distributionCenterRepository->findWithoutFail($id);

        if (empty($distributionCenter)) {
            Flash::error('Distribution Center not found');

            return redirect(route('distributionCenters.index'));
        }

        $distributionCenter = $this->distributionCenterRepository->update($request->all(), $id);

        Flash::success('Distribution Center updated successfully.');

        return redirect(route('distributionCenters.index'));
    }

    /**
     * Remove the specified DistributionCenter from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $distributionCenter = $this->distributionCenterRepository->findWithoutFail($id);

        if (empty($distributionCenter)) {
            Flash::error('Distribution Center not found');

            return redirect(route('distributionCenters.index'));
        }

        $this->distributionCenterRepository->delete($id);

        Flash::success('Distribution Center deleted successfully.');

        return redirect(route('distributionCenters.index'));
    }
}
