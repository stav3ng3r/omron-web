<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientAddressRequest;
use App\Http\Requests\UpdateClientAddressRequest;
use App\Repositories\ClientAddressRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ClientAddressController extends AppBaseController
{
    /** @var  ClientAddressRepository */
    private $clientAddressRepository;

    public function __construct(ClientAddressRepository $clientAddressRepo)
    {
        $this->clientAddressRepository = $clientAddressRepo;
    }

    /**
     * Display a listing of the ClientAddress.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->clientAddressRepository->pushCriteria(new RequestCriteria($request));
        $clientAddresses = $this->clientAddressRepository->all();

        return view('client_addresses.index')
            ->with('clientAddresses', $clientAddresses);
    }

    /**
     * Show the form for creating a new ClientAddress.
     *
     * @return Response
     */
    public function create()
    {
        return view('client_addresses.create');
    }

    /**
     * Store a newly created ClientAddress in storage.
     *
     * @param CreateClientAddressRequest $request
     *
     * @return Response
     */
    public function store(CreateClientAddressRequest $request)
    {
        $input = $request->all();

        $clientAddress = $this->clientAddressRepository->create($input);

        Flash::success('Client Address saved successfully.');

        return redirect(route('clientAddresses.index'));
    }

    /**
     * Display the specified ClientAddress.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientAddress = $this->clientAddressRepository->findWithoutFail($id);

        if (empty($clientAddress)) {
            Flash::error('Client Address not found');

            return redirect(route('clientAddresses.index'));
        }

        return view('client_addresses.show')->with('clientAddress', $clientAddress);
    }

    /**
     * Show the form for editing the specified ClientAddress.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientAddress = $this->clientAddressRepository->findWithoutFail($id);

        if (empty($clientAddress)) {
            Flash::error('Client Address not found');

            return redirect(route('clientAddresses.index'));
        }

        return view('client_addresses.edit')->with('clientAddress', $clientAddress);
    }

    /**
     * Update the specified ClientAddress in storage.
     *
     * @param  int              $id
     * @param UpdateClientAddressRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientAddressRequest $request)
    {
        $clientAddress = $this->clientAddressRepository->findWithoutFail($id);

        if (empty($clientAddress)) {
            Flash::error('Client Address not found');

            return redirect(route('clientAddresses.index'));
        }

        $clientAddress = $this->clientAddressRepository->update($request->all(), $id);

        Flash::success('Client Address updated successfully.');

        return redirect(route('clientAddresses.index'));
    }

    /**
     * Remove the specified ClientAddress from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientAddress = $this->clientAddressRepository->findWithoutFail($id);

        if (empty($clientAddress)) {
            Flash::error('Client Address not found');

            return redirect(route('clientAddresses.index'));
        }

        $this->clientAddressRepository->delete($id);

        Flash::success('Client Address deleted successfully.');

        return redirect(route('clientAddresses.index'));
    }
}
