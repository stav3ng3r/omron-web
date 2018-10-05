<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDistributorMarkupRequest;
use App\Http\Requests\UpdateDistributorMarkupRequest;
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
     */
    public function index(Request $request)
    {
        $this->distributorMarkupRepository->pushCriteria(new RequestCriteria($request));
        $distributorMarkups = $this->distributorMarkupRepository->all();

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
        return view('distributor_markups.create');
    }

    /**
     * Store a newly created DistributorMarkup in storage.
     *
     * @param CreateDistributorMarkupRequest $request
     *
     * @return Response
     */
    public function store(CreateDistributorMarkupRequest $request)
    {
        $input = $request->all();

        $distributorMarkup = $this->distributorMarkupRepository->create($input);

        Flash::success('Distributor Markup saved successfully.');

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
            Flash::error('Distributor Markup not found');

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
            Flash::error('Distributor Markup not found');

            return redirect(route('distributorMarkups.index'));
        }

        return view('distributor_markups.edit')->with('distributorMarkup', $distributorMarkup);
    }

    /**
     * Update the specified DistributorMarkup in storage.
     *
     * @param  int              $id
     * @param UpdateDistributorMarkupRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDistributorMarkupRequest $request)
    {
        $distributorMarkup = $this->distributorMarkupRepository->findWithoutFail($id);

        if (empty($distributorMarkup)) {
            Flash::error('Distributor Markup not found');

            return redirect(route('distributorMarkups.index'));
        }

        $distributorMarkup = $this->distributorMarkupRepository->update($request->all(), $id);

        Flash::success('Distributor Markup updated successfully.');

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
            Flash::error('Distributor Markup not found');

            return redirect(route('distributorMarkups.index'));
        }

        $this->distributorMarkupRepository->delete($id);

        Flash::success('Distributor Markup deleted successfully.');

        return redirect(route('distributorMarkups.index'));
    }
}
