<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDistributorRequest;
use App\Http\Requests\UpdateDistributorRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\ProductBrand;
use App\Models\RegionalOffice;
use App\Repositories\DistributorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use PHPUnit\Framework\Constraint\Count;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DistributorController extends AppBaseController
{
    /** @var  DistributorRepository */
    private $distributorRepository;

    public function __construct(DistributorRepository $distributorRepo)
    {
        $this->distributorRepository = $distributorRepo;
    }

    /**
     * Display a listing of the Distributor.
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->distributorRepository->pushCriteria(new RequestCriteria($request));
        $distributors = $this->distributorRepository->all();

        return view('distributors.index')
            ->with('distributors', $distributors);
    }

    /**
     * Show the form for creating a new Distributor.
     *
     * @return Response
     */
    public function create()
    {
        $countries = Country::all()->pluck('descripcion', 'id');
        $cities = City::all()->pluck('descripcion', 'id');
        $brands = ProductBrand::all()->pluck('descripcion', 'id');
        $regionalOffices = RegionalOffice::all()->pluck('titulo', 'id');

        return view('distributors.create', compact('countries', 'cities', 'brands', 'regionalOffices'));
    }

    /**
     * Store a newly created Distributor in storage.
     *
     * @param CreateDistributorRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateDistributorRequest $request)
    {
        $input = $request->all();

        $distributor = $this->distributorRepository->create($input);

        Flash::success('Distribuidor guardado exitosamente.');
        Flash::important();

        return redirect(route('distributors.index'));
    }

    /**
     * Display the specified Distributor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $distributor = $this->distributorRepository->findWithoutFail($id);

        if (empty($distributor)) {
            Flash::error('Distribuidor no encontrado.');

            return redirect(route('distributors.index'));
        }

        return view('distributors.show')->with('distributor', $distributor);
    }

    /**
     * Show the form for editing the specified Distributor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $distributor = $this->distributorRepository->findWithoutFail($id);

        if (empty($distributor)) {
            Flash::error('Distribuidor no encontrado.');

            return redirect(route('distributors.index'));
        }

        $countries = Country::all()->pluck('descripcion', 'id');
        $cities = City::all()->pluck('descripcion', 'id');
        $brands = ProductBrand::all()->pluck('descripcion', 'id');
        $regionalOffices = RegionalOffice::all()->pluck('titulo', 'id');

        return view('distributors.edit')->with(compact('distributor', 'countries', 'cities', 'brands',
            'regionalOffices'));
    }

    /**
     * Update the specified Distributor in storage.
     *
     * @param  int $id
     * @param UpdateDistributorRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateDistributorRequest $request)
    {
        $distributor = $this->distributorRepository->findWithoutFail($id);

        if (empty($distributor)) {
            Flash::error('Distribuidor no encontrado.');

            return redirect(route('distributors.index'));
        }

        $distributor = $this->distributorRepository->update($request->all(), $id);

        Flash::success('Distribuidor actualizado correctamente.');
        Flash::important();

        return redirect(route('distributors.index'));
    }

    /**
     * Remove the specified Distributor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $distributor = $this->distributorRepository->findWithoutFail($id);

        if (empty($distributor)) {
            Flash::error('Distribuidor no encontrado.');

            return redirect(route('distributors.index'));
        }

        $this->distributorRepository->delete($id);

        Flash::success('Distribuidor borrado.');
        Flash::important();

        return redirect(route('distributors.index'));
    }
}
