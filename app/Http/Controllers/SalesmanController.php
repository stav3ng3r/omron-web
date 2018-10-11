<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSalesmanRequest;
use App\Http\Requests\UpdateSalesmanRequest;
use App\Models\Person;
use App\Repositories\SalesmanRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SalesmanController extends AppBaseController
{
    /** @var  SalesmanRepository */
    private $salesmanRepository;

    public function __construct(SalesmanRepository $salesmanRepo)
    {
        $this->salesmanRepository = $salesmanRepo;
    }

    /**
     * Display a listing of the Salesman.
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->salesmanRepository->pushCriteria(new RequestCriteria($request));
        $salesmen = $this->salesmanRepository->with('person')->paginate(30);

        return view('salesmen.index')
            ->with('salesmen', $salesmen);
    }

    /**
     * Show the form for creating a new Salesman.
     *
     * @return Response
     */
    public function create()
    {
        $people = Person::all()->pluck('full_name', 'id');

        return view('salesmen.create', compact('people'));
    }

    /**
     * Store a newly created Salesman in storage.
     *
     * @param CreateSalesmanRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateSalesmanRequest $request)
    {
        $input = $request->all();

        if (!isset($input['activo']))
            $input['activo'] = FALSE;
        else
            $input['activo'] = TRUE;

        $salesman = $this->salesmanRepository->create($input);

        Flash::success('Vendedor guardado exitosamente');
        Flash::important();

        return redirect(route('salesmen.index'));
    }

    /**
     * Display the specified Salesman.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salesman = $this->salesmanRepository->findWithoutFail($id);

        if (empty($salesman)) {
            Flash::error('Vendedor no encontrado.');

            return redirect(route('salesmen.index'));
        }

        return view('salesmen.show')->with('salesman', $salesman);
    }

    /**
     * Show the form for editing the specified Salesman.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salesman = $this->salesmanRepository->findWithoutFail($id);

        if (empty($salesman)) {
            Flash::error('Vendedor no encontrado.');

            return redirect(route('salesmen.index'));
        }

        $people = Person::all()->pluck('full_name', 'id');

        return view('salesmen.edit')->with(compact('salesman', 'people'));
    }

    /**
     * Update the specified Salesman in storage.
     *
     * @param  int $id
     * @param UpdateSalesmanRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateSalesmanRequest $request)
    {
        $salesman = $this->salesmanRepository->findWithoutFail($id);

        if (empty($salesman)) {
            Flash::error('Vendedor no encontrado.');

            return redirect(route('salesmen.index'));
        }

        $input = $request->all();

        if (!isset($input['activo']))
            $input['activo'] = FALSE;
        else
            $input['activo'] = TRUE;

        $salesman = $this->salesmanRepository->update($input, $id);

        Flash::success('Vendedor actualizado exitosamente');
        Flash::important();

        return redirect(route('salesmen.index'));
    }

    /**
     * Remove the specified Salesman from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salesman = $this->salesmanRepository->findWithoutFail($id);

        if (empty($salesman)) {
            Flash::error('Vendedor no encontrado.');

            return redirect(route('salesmen.index'));
        }

        $this->salesmanRepository->delete($id);

        Flash::success('Vendedor eliminado exitosamente');
        Flash::important();

        return redirect(route('salesmen.index'));
    }
}
