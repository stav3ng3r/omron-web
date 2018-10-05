<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientContactRequest;
use App\Http\Requests\UpdateClientContactRequest;
use App\Repositories\ClientContactRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
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
     */
    public function index(Request $request)
    {
        $this->clientContactRepository->pushCriteria(new RequestCriteria($request));
        $clientContacts = $this->clientContactRepository->all();

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
        return view('client_contacts.create');
    }

    /**
     * Store a newly created ClientContact in storage.
     *
     * @param CreateClientContactRequest $request
     *
     * @return Response
     */
    public function store(CreateClientContactRequest $request)
    {
        $input = $request->all();

        $clientContact = $this->clientContactRepository->create($input);

        Flash::success('Client Contact saved successfully.');

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
            Flash::error('Client Contact not found');

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
            Flash::error('Client Contact not found');

            return redirect(route('clientContacts.index'));
        }

        return view('client_contacts.edit')->with('clientContact', $clientContact);
    }

    /**
     * Update the specified ClientContact in storage.
     *
     * @param  int              $id
     * @param UpdateClientContactRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientContactRequest $request)
    {
        $clientContact = $this->clientContactRepository->findWithoutFail($id);

        if (empty($clientContact)) {
            Flash::error('Client Contact not found');

            return redirect(route('clientContacts.index'));
        }

        $clientContact = $this->clientContactRepository->update($request->all(), $id);

        Flash::success('Client Contact updated successfully.');

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
            Flash::error('Client Contact not found');

            return redirect(route('clientContacts.index'));
        }

        $this->clientContactRepository->delete($id);

        Flash::success('Client Contact deleted successfully.');

        return redirect(route('clientContacts.index'));
    }
}
