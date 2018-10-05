<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientPaymentMethodRequest;
use App\Http\Requests\UpdateClientPaymentMethodRequest;
use App\Repositories\ClientPaymentMethodRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ClientPaymentMethodController extends AppBaseController
{
    /** @var  ClientPaymentMethodRepository */
    private $clientPaymentMethodRepository;

    public function __construct(ClientPaymentMethodRepository $clientPaymentMethodRepo)
    {
        $this->clientPaymentMethodRepository = $clientPaymentMethodRepo;
    }

    /**
     * Display a listing of the ClientPaymentMethod.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->clientPaymentMethodRepository->pushCriteria(new RequestCriteria($request));
        $clientPaymentMethods = $this->clientPaymentMethodRepository->all();

        return view('client_payment_methods.index')
            ->with('clientPaymentMethods', $clientPaymentMethods);
    }

    /**
     * Show the form for creating a new ClientPaymentMethod.
     *
     * @return Response
     */
    public function create()
    {
        return view('client_payment_methods.create');
    }

    /**
     * Store a newly created ClientPaymentMethod in storage.
     *
     * @param CreateClientPaymentMethodRequest $request
     *
     * @return Response
     */
    public function store(CreateClientPaymentMethodRequest $request)
    {
        $input = $request->all();

        $clientPaymentMethod = $this->clientPaymentMethodRepository->create($input);

        Flash::success('Client Payment Method saved successfully.');

        return redirect(route('clientPaymentMethods.index'));
    }

    /**
     * Display the specified ClientPaymentMethod.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clientPaymentMethod = $this->clientPaymentMethodRepository->findWithoutFail($id);

        if (empty($clientPaymentMethod)) {
            Flash::error('Client Payment Method not found');

            return redirect(route('clientPaymentMethods.index'));
        }

        return view('client_payment_methods.show')->with('clientPaymentMethod', $clientPaymentMethod);
    }

    /**
     * Show the form for editing the specified ClientPaymentMethod.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clientPaymentMethod = $this->clientPaymentMethodRepository->findWithoutFail($id);

        if (empty($clientPaymentMethod)) {
            Flash::error('Client Payment Method not found');

            return redirect(route('clientPaymentMethods.index'));
        }

        return view('client_payment_methods.edit')->with('clientPaymentMethod', $clientPaymentMethod);
    }

    /**
     * Update the specified ClientPaymentMethod in storage.
     *
     * @param  int              $id
     * @param UpdateClientPaymentMethodRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientPaymentMethodRequest $request)
    {
        $clientPaymentMethod = $this->clientPaymentMethodRepository->findWithoutFail($id);

        if (empty($clientPaymentMethod)) {
            Flash::error('Client Payment Method not found');

            return redirect(route('clientPaymentMethods.index'));
        }

        $clientPaymentMethod = $this->clientPaymentMethodRepository->update($request->all(), $id);

        Flash::success('Client Payment Method updated successfully.');

        return redirect(route('clientPaymentMethods.index'));
    }

    /**
     * Remove the specified ClientPaymentMethod from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clientPaymentMethod = $this->clientPaymentMethodRepository->findWithoutFail($id);

        if (empty($clientPaymentMethod)) {
            Flash::error('Client Payment Method not found');

            return redirect(route('clientPaymentMethods.index'));
        }

        $this->clientPaymentMethodRepository->delete($id);

        Flash::success('Client Payment Method deleted successfully.');

        return redirect(route('clientPaymentMethods.index'));
    }
}
