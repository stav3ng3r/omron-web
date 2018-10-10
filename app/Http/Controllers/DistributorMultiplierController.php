<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDistributorMultiplierRequest;
use App\Http\Requests\UpdateDistributorMultiplierRequest;
use App\Models\Distributor;
use App\Models\ProductCategory;
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
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->distributorMultiplierRepository->pushCriteria(new RequestCriteria($request));
        $distributorMultipliers = $this->distributorMultiplierRepository->with('distributor')->all();

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
        $distributors = Distributor::all()->pluck('titulo', 'id');
        $categories = ProductCategory::all()->pluck('descripcion', 'id');

        return view('distributor_multipliers.create', compact('distributors', 'categories'));
    }

    /**
     * Store a newly created DistributorMultiplier in storage.
     *
     * @param CreateDistributorMultiplierRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateDistributorMultiplierRequest $request)
    {
        $input = $request->all();

        $distributorMultiplier = $this->distributorMultiplierRepository->create($input);

        Flash::success('Multiplicador guardado exitosamente.');
        Flash::important();

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
            Flash::error('Multiplicador no encontrado.');

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
            Flash::error('Multiplicador no encontrado.');

            return redirect(route('distributorMultipliers.index'));
        }

        $distributors = Distributor::all()->pluck('titulo', 'id');
        $categories = ProductCategory::all()->pluck('descripcion', 'id');

        return view('distributor_multipliers.edit')->with(compact('distributorMultiplier',
            'distributors', 'categories'));
    }

    /**
     * Update the specified DistributorMultiplier in storage.
     *
     * @param  int $id
     * @param UpdateDistributorMultiplierRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateDistributorMultiplierRequest $request)
    {
        $distributorMultiplier = $this->distributorMultiplierRepository->findWithoutFail($id);

        if (empty($distributorMultiplier)) {
            Flash::error('Multiplicador no encontrado.');

            return redirect(route('distributorMultipliers.index'));
        }

        $distributorMultiplier = $this->distributorMultiplierRepository->update($request->all(), $id);

        Flash::success('Multiplicador actualizado exitosamente.');
        Flash::important();

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
            Flash::error('Multiplicador no encontrado.');

            return redirect(route('distributorMultipliers.index'));
        }

        $this->distributorMultiplierRepository->delete($id);

        Flash::success('Multiplicador eliminado exitosamente');
        Flash::important();

        return redirect(route('distributorMultipliers.index'));
    }
}
