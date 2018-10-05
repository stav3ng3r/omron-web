<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRegionalOfficeRequest;
use App\Http\Requests\UpdateRegionalOfficeRequest;
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
        return view('regional_offices.create');
    }

    /**
     * Store a newly created RegionalOffice in storage.
     *
     * @param CreateRegionalOfficeRequest $request
     *
     * @return Response
     */
    public function store(CreateRegionalOfficeRequest $request)
    {
        $input = $request->all();

        $regionalOffice = $this->regionalOfficeRepository->create($input);

        Flash::success('Regional Office saved successfully.');

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
            Flash::error('Regional Office not found');

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

        if (empty($regionalOffice)) {
            Flash::error('Regional Office not found');

            return redirect(route('regionalOffices.index'));
        }

        return view('regional_offices.edit')->with('regionalOffice', $regionalOffice);
    }

    /**
     * Update the specified RegionalOffice in storage.
     *
     * @param  int              $id
     * @param UpdateRegionalOfficeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRegionalOfficeRequest $request)
    {
        $regionalOffice = $this->regionalOfficeRepository->findWithoutFail($id);

        if (empty($regionalOffice)) {
            Flash::error('Regional Office not found');

            return redirect(route('regionalOffices.index'));
        }

        $regionalOffice = $this->regionalOfficeRepository->update($request->all(), $id);

        Flash::success('Regional Office updated successfully.');

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
            Flash::error('Regional Office not found');

            return redirect(route('regionalOffices.index'));
        }

        $this->regionalOfficeRepository->delete($id);

        Flash::success('Regional Office deleted successfully.');

        return redirect(route('regionalOffices.index'));
    }
}
