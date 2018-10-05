<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRegionalOfficeRequest;
use App\Http\Requests\UpdateRegionalOfficeRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\DistributionCenter;
use App\Models\ProductBrand;
use App\Repositories\RegionalOfficeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RegionalOfficeController extends AppBaseController
{
    /** @var  RegionalOfficeRepository */
    private $regionalOfficeRepository;

    public function __construct(RegionalOfficeRepository $regionalOfficeRepo)
    {
        $this->regionalOfficeRepository = $regionalOfficeRepo;
    }

    /**
     * Display a listing of the RegionalOffice.
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->regionalOfficeRepository->pushCriteria(new RequestCriteria($request));
        $regionalOffices = $this->regionalOfficeRepository->all();

        return view('regional_offices.index')
            ->with('regionalOffices', $regionalOffices);
    }

    /**
     * Show the form for creating a new RegionalOffice.
     *
     * @return Response
     */
    public function create()
    {
        $countries = Country::all()->pluck('descripcion', 'id');
        $cities = City::all()->pluck('descripcion', 'id');
        $brands = ProductBrand::all()->pluck('descripcion', 'id');
        $distributionCenters = DistributionCenter::all()->pluck('titulo', 'id');

        return view('regional_offices.create', compact('countries', 'cities', 'brands',
            'distributionCenters'));
    }

    /**
     * Store a newly created RegionalOffice in storage.
     *
     * @param CreateRegionalOfficeRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateRegionalOfficeRequest $request)
    {
        $input = $request->all();

        $regionalOffice = $this->regionalOfficeRepository->create($input);

        Flash::success('Oficina Regional saved successfully.');

        return redirect(route('regionalOffices.index'));
    }

    /**
     * Display the specified RegionalOffice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $regionalOffice = $this->regionalOfficeRepository->findWithoutFail($id);

        if (empty($regionalOffice)) {
            Flash::error('Oficina Regional no econtrada.');

            return redirect(route('regionalOffices.index'));
        }

        return view('regional_offices.show')->with('regionalOffice', $regionalOffice);
    }

    /**
     * Show the form for editing the specified RegionalOffice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $regionalOffice = $this->regionalOfficeRepository->findWithoutFail($id);
        $countries = Country::all()->pluck('descripcion', 'id');
        $cities = City::all()->pluck('descripcion', 'id');
        $brands = ProductBrand::all()->pluck('descripcion', 'id');
        $distributionCenters = DistributionCenter::all()->pluck('titulo', 'id');

        if (empty($regionalOffice)) {
            Flash::error('Oficina Regional no econtrada.');

            return redirect(route('regionalOffices.index'));
        }

        return view('regional_offices.edit')->with(compact('regionalOffice', 'cities', 'countries', 'brands',
            'distributionCenters'));
    }

    /**
     * Update the specified RegionalOffice in storage.
     *
     * @param  int $id
     * @param UpdateRegionalOfficeRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateRegionalOfficeRequest $request)
    {
        $regionalOffice = $this->regionalOfficeRepository->findWithoutFail($id);

        if (empty($regionalOffice)) {
            Flash::error('Oficina Regional no econtrada.');

            return redirect(route('regionalOffices.index'));
        }

        $regionalOffice = $this->regionalOfficeRepository->update($request->all(), $id);

        Flash::success('Oficina Regional updated successfully.');

        return redirect(route('regionalOffices.index'));
    }

    /**
     * Remove the specified RegionalOffice from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $regionalOffice = $this->regionalOfficeRepository->findWithoutFail($id);

        if (empty($regionalOffice)) {
            Flash::error('Oficina Regional no econtrada.');

            return redirect(route('regionalOffices.index'));
        }

        $this->regionalOfficeRepository->delete($id);

        Flash::success('Oficina Regional deleted successfully.');

        return redirect(route('regionalOffices.index'));
    }
}
