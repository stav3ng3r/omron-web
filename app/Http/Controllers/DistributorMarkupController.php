<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDistributorMarkupRequest;
use App\Http\Requests\UpdateDistributorMarkupRequest;
use App\Models\Distributor;
use App\Repositories\DistributorMarkupRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DistributorMarkupController extends AppBaseController
{
    /** @var  DistributorMarkupRepository */
    private $distributorMarkupRepository;

    public function __construct(DistributorMarkupRepository $distributorMarkupRepo)
    {
        $this->distributorMarkupRepository = $distributorMarkupRepo;
    }

    /**
     * Display a listing of the DistributorMarkup.
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->distributorMarkupRepository->pushCriteria(new RequestCriteria($request));
        $distributorMarkups = $this->distributorMarkupRepository->with('distributor')->all();

        return view('distributor_markups.index')
            ->with('distributorMarkups', $distributorMarkups);
    }

    /**
     * Show the form for creating a new DistributorMarkup.
     *
     * @return Response
     */
    public function create()
    {
        $distributors = Distributor::all()->pluck('titulo', 'id');

        return view('distributor_markups.create', compact('distributors'));
    }

    /**
     * Store a newly created DistributorMarkup in storage.
     *
     * @param CreateDistributorMarkupRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateDistributorMarkupRequest $request)
    {
        $input = $request->all();

        $distributorMarkup = $this->distributorMarkupRepository->create($input);

        Flash::success('Markup guardado exitosamente.');
        Flash::important();

        return redirect(route('distributorMarkups.index'));
    }

    /**
     * Display the specified DistributorMarkup.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $distributorMarkup = $this->distributorMarkupRepository->findWithoutFail($id);

        if (empty($distributorMarkup)) {
            Flash::error('Markup no encontrado.');

            return redirect(route('distributorMarkups.index'));
        }

        return view('distributor_markups.show')->with('distributorMarkup', $distributorMarkup);
    }

    /**
     * Show the form for editing the specified DistributorMarkup.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $distributorMarkup = $this->distributorMarkupRepository->findWithoutFail($id);

        if (empty($distributorMarkup)) {
            Flash::error('Markup no encontrado.');

            return redirect(route('distributorMarkups.index'));
        }

        $distributors = Distributor::all()->pluck('titulo', 'id');

        return view('distributor_markups.edit')->with(compact('distributorMarkup', 'distributors'));
    }

    /**
     * Update the specified DistributorMarkup in storage.
     *
     * @param  int $id
     * @param UpdateDistributorMarkupRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateDistributorMarkupRequest $request)
    {
        $distributorMarkup = $this->distributorMarkupRepository->findWithoutFail($id);

        if (empty($distributorMarkup)) {
            Flash::error('Markup no encontrado.');

            return redirect(route('distributorMarkups.index'));
        }

        $distributorMarkup = $this->distributorMarkupRepository->update($request->all(), $id);

        Flash::success('Markup actualizado exitosamente.');
        Flash::important();

        return redirect(route('distributorMarkups.index'));
    }

    /**
     * Remove the specified DistributorMarkup from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $distributorMarkup = $this->distributorMarkupRepository->findWithoutFail($id);

        if (empty($distributorMarkup)) {
            Flash::error('Markup no encontrado.');

            return redirect(route('distributorMarkups.index'));
        }

        $this->distributorMarkupRepository->delete($id);

        Flash::success('Markup borrado exitosamente.');
        Flash::important();

        return redirect(route('distributorMarkups.index'));
    }
}
