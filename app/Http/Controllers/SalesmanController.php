<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSalesmanRequest;
use App\Http\Requests\UpdateSalesmanRequest;
use App\Repositories\SalesmanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
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
     */
    public function index(Request $request)
    {
        $this->salesmanRepository->pushCriteria(new RequestCriteria($request));
        $salesmen = $this->salesmanRepository->all();

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
        return view('salesmen.create');
    }

    /**
     * Store a newly created Salesman in storage.
     *
     * @param CreateSalesmanRequest $request
     *
     * @return Response
     */
    public function store(CreateSalesmanRequest $request)
    {
        $input = $request->all();

        $salesman = $this->salesmanRepository->create($input);

        Flash::success('Salesman saved successfully.');

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
            Flash::error('Salesman not found');

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
            Flash::error('Salesman not found');

            return redirect(route('salesmen.index'));
        }

        return view('salesmen.edit')->with('salesman', $salesman);
    }

    /**
     * Update the specified Salesman in storage.
     *
     * @param  int              $id
     * @param UpdateSalesmanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalesmanRequest $request)
    {
        $salesman = $this->salesmanRepository->findWithoutFail($id);

        if (empty($salesman)) {
            Flash::error('Salesman not found');

            return redirect(route('salesmen.index'));
        }

        $salesman = $this->salesmanRepository->update($request->all(), $id);

        Flash::success('Salesman updated successfully.');

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
            Flash::error('Salesman not found');

            return redirect(route('salesmen.index'));
        }

        $this->salesmanRepository->delete($id);

        Flash::success('Salesman deleted successfully.');

        return redirect(route('salesmen.index'));
    }
}
