<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDistributionCenterRequest;
use App\Http\Requests\UpdateDistributionCenterRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\ProductBrand;
use App\Repositories\DistributionCenterRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Facade;
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
     * @throws \Prettus\Repository\Exceptions\RepositoryException
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
        $countries = Country::all()->pluck('descripcion', 'id');
        $cities = City::all()->pluck('descripcion', 'id');
        $brands = ProductBrand::all()->pluck('descripcion', 'id');

        return view('distribution_centers.create', compact('countries', 'cities', 'brands'));
    }

    /**
     * Store a newly created DistributionCenter in storage.
     *
     * @param CreateDistributionCenterRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateDistributionCenterRequest $request)
    {
        $input = $request->all();

        $distributionCenter = $this->distributionCenterRepository->create($input);

        Flash::success('Centro de Distribucion creado exitosamente.');
        Flash::important();

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
            Flash::error('Centro de Distribucion no encontrado.');

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

        $countries = Country::all()->pluck('descripcion', 'id');
        $cities = City::all()->pluck('descripcion', 'id');
        $brands = ProductBrand::all()->pluck('descripcion', 'id');

        if (empty($distributionCenter)) {
            Flash::error('Centro de Distribucion no encontrado');

            return redirect(route('distributionCenters.index'));
        }

        return view('distribution_centers.edit')->with(compact('distributionCenter', 'countries', 'cities', 'brands'));
    }

    /**
     * Update the specified DistributionCenter in storage.
     *
     * @param  int $id
     * @param UpdateDistributionCenterRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateDistributionCenterRequest $request)
    {
        $distributionCenter = $this->distributionCenterRepository->findWithoutFail($id);

        if (empty($distributionCenter)) {
            Flash::error('Centro de Distribucion no encontrado');

            return redirect(route('distributionCenters.index'));
        }

        $distributionCenter = $this->distributionCenterRepository->update($request->all(), $id);

        Flash::success('Centro de Distribucion actualizado exitosamente.');
        Flash::important();

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
            Flash::error('Centro de Distribucion no encontrado.');

            return redirect(route('distributionCenters.index'));
        }

        $this->distributionCenterRepository->delete($id);

        Flash::success('Centro de Distribucion eliminado.');
        Flash::important();

        return redirect(route('distributionCenters.index'));
    }
}
