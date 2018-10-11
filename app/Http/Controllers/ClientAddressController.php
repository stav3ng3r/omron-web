<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientAddressRequest;
use App\Http\Requests\UpdateClientAddressRequest;
use App\Models\City;
use App\Models\Client;
use App\Models\Country;
use App\Repositories\ClientAddressRepository;
use Flash;
use Illuminate\Http\Request;
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
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->clientAddressRepository->pushCriteria(new RequestCriteria($request));
        $clientAddresses = $this->clientAddressRepository->with(['city', 'client', 'country'])
            ->paginate(30);

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
        $countries = Country::all()->pluck('descripcion', 'id');
        $cities = City::all()->pluck('descripcion', 'id');
        $clients = Client::all()->pluck('descripcion', 'id');

        return view('client_addresses.create', compact('countries', 'cities', 'clients'));
    }

    /**
     * Store a newly created ClientAddress in storage.
     *
     * @param CreateClientAddressRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateClientAddressRequest $request)
    {
        $input = $request->all();

        $clientAddress = $this->clientAddressRepository->create($input);

        Flash::success('Direccion guardada exitosamente.');
        Flash::important();

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
            Flash::error('Direccion no encontrada.');

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
            Flash::error('Direccion no encontrada.');

            return redirect(route('clientAddresses.index'));
        }

        $countries = Country::all()->pluck('descripcion', 'id');
        $cities = City::all()->pluck('descripcion', 'id');
        $clients = Client::all()->pluck('descripcion', 'id');

        return view('client_addresses.edit')->with(compact('clientAddress', 'countries', 'cities', 'clients'));
    }

    /**
     * Update the specified ClientAddress in storage.
     *
     * @param  int $id
     * @param UpdateClientAddressRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateClientAddressRequest $request)
    {
        $clientAddress = $this->clientAddressRepository->findWithoutFail($id);

        if (empty($clientAddress)) {
            Flash::error('Direccion no encontrada.');

            return redirect(route('clientAddresses.index'));
        }

        $clientAddress = $this->clientAddressRepository->update($request->all(), $id);

        Flash::success('Direcciona Actualizada exitosamente');
        Flash::important();

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
            Flash::error('Direccion no encontrada.');

            return redirect(route('clientAddresses.index'));
        }

        $this->clientAddressRepository->delete($id);

        Flash::success('Direccion eliminada exitosamente.');
        Flash::important();

        return redirect(route('clientAddresses.index'));
    }
}
