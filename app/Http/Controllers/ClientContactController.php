<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientContactRequest;
use App\Http\Requests\UpdateClientContactRequest;
use App\Models\Client;
use App\Repositories\ClientContactRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ClientContactController extends AppBaseController
{
    /** @var  ClientContactRepository */
    private $clientContactRepository;

    public function __construct(ClientContactRepository $clientContactRepo)
    {
        $this->clientContactRepository = $clientContactRepo;
    }

    /**
     * Display a listing of the ClientContact.
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->clientContactRepository->pushCriteria(new RequestCriteria($request));
        $clientContacts = $this->clientContactRepository->with('client')
            ->paginate();

        return view('client_contacts.index')
            ->with('clientContacts', $clientContacts);
    }

    /**
     * Show the form for creating a new ClientContact.
     *
     * @return Response
     */
    public function create()
    {
        $clients = Client::all()->pluck('descripcion', 'id');

        return view('client_contacts.create', compact('clients'));
    }

    /**
     * Store a newly created ClientContact in storage.
     *
     * @param CreateClientContactRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateClientContactRequest $request)
    {
        $input = $request->all();

        $clientContact = $this->clientContactRepository->create($input);

        Flash::success('Contacto guardado exitosamente.');
        Flash::important();

        return redirect(route('clientContacts.index'));
    }

    /**
     * Display the specified ClientContact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientContact = $this->clientContactRepository->findWithoutFail($id);

        if (empty($clientContact)) {
            Flash::error('Contacto no encontrado.');

            return redirect(route('clientContacts.index'));
        }

        return view('client_contacts.show')->with('clientContact', $clientContact);
    }

    /**
     * Show the form for editing the specified ClientContact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientContact = $this->clientContactRepository->findWithoutFail($id);

        if (empty($clientContact)) {
            Flash::error('Contacto no encontrado.');

            return redirect(route('clientContacts.index'));
        }

        $clients = Client::all()->pluck('descripcion', 'id');

        return view('client_contacts.edit')->with(compact('clientContact', 'clients'));
    }

    /**
     * Update the specified ClientContact in storage.
     *
     * @param  int $id
     * @param UpdateClientContactRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateClientContactRequest $request)
    {
        $clientContact = $this->clientContactRepository->findWithoutFail($id);

        if (empty($clientContact)) {
            Flash::error('Contacto no encontrado.');

            return redirect(route('clientContacts.index'));
        }

        $clientContact = $this->clientContactRepository->update($request->all(), $id);

        Flash::success('Contacto actualizado exitosamente');
        Flash::important();

        return redirect(route('clientContacts.index'));
    }

    /**
     * Remove the specified ClientContact from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientContact = $this->clientContactRepository->findWithoutFail($id);

        if (empty($clientContact)) {
            Flash::error('Contacto no encontrado.');

            return redirect(route('clientContacts.index'));
        }

        $this->clientContactRepository->delete($id);

        Flash::success('Contacto elminado exitosamente.');
        Flash::important();

        return redirect(route('clientContacts.index'));
    }
}
