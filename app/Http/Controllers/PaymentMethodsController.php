<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePaymentMethodsRequest;
use App\Http\Requests\UpdatePaymentMethodsRequest;
use App\Repositories\PaymentMethodsRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PaymentMethodsController extends AppBaseController
{
    /** @var  PaymentMethodsRepository */
    private $paymentMethodsRepository;

    public function __construct(PaymentMethodsRepository $paymentMethodRepo)
    {
        $this->paymentMethodsRepository = $paymentMethodRepo;
    }

    /**
     * Display a listing of the PaymentMethods.
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->paymentMethodsRepository->pushCriteria(new RequestCriteria($request));
        $paymentMethod = $this->paymentMethodsRepository->paginate();

        return view('payment_methods.index')
            ->with('paymentMethods', $paymentMethod);
    }

    /**
     * Show the form for creating a new PaymentMethods.
     *
     * @return Response
     */
    public function create()
    {
        return view('payment_methods.create');
    }

    /**
     * Store a newly created PaymentMethods in storage.
     *
     * @param CreatePaymentMethodsRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreatePaymentMethodsRequest $request)
    {
        $input = $request->all();

        $paymentMethod = $this->paymentMethodsRepository->create($input);

        Flash::success('Forma de Pago guardada exitosamente.');
        Flash::important();

        return redirect(route('paymentMethods.index'));
    }

    /**
     * Display the specified PaymentMethods.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $paymentMethod = $this->paymentMethodsRepository->findWithoutFail($id);

        if (empty($paymentMethod)) {
            Flash::error('Forma de Pago no encontrada.');

            return redirect(route('paymentMethods.index'));
        }

        return view('payment_methods.show')->with('paymentMethod', $paymentMethod);
    }

    /**
     * Show the form for editing the specified PaymentMethods.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $paymentMethod = $this->paymentMethodsRepository->findWithoutFail($id);

        if (empty($paymentMethod)) {
            Flash::error('Forma de Pago no encontrada.');

            return redirect(route('paymentMethods.index'));
        }

        return view('payment_methods.edit')->with('paymentMethod', $paymentMethod);
    }

    /**
     * Update the specified PaymentMethods in storage.
     *
     * @param  int $id
     * @param UpdatePaymentMethodsRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdatePaymentMethodsRequest $request)
    {
        $paymentMethod = $this->paymentMethodsRepository->findWithoutFail($id);

        if (empty($paymentMethod)) {
            Flash::error('Forma de Pago no encontrada.');

            return redirect(route('paymentMethods.index'));
        }

        $paymentMethod = $this->paymentMethodsRepository->update($request->all(), $id);

        Flash::success('Forma de Pago actualizada exitosamente.');
        Flash::important();

        return redirect(route('paymentMethods.index'));
    }

    /**
     * Remove the specified PaymentMethods from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $paymentMethod = $this->paymentMethodsRepository->findWithoutFail($id);

        if (empty($paymentMethod)) {
            Flash::error('Forma de Pago no encontrada.');

            return redirect(route('paymentMethods.index'));
        }

        $this->paymentMethodsRepository->delete($id);

        Flash::success('Forma de Pago eliminada exitosamente.');
        Flash::important();

        return redirect(route('paymentMethods.index'));
    }
}
