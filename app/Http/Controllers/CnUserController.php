<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCnUserRequest;
use App\Http\Requests\UpdateCnUserRequest;
use App\Repositories\CnUserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CnUserController extends AppBaseController
{
    /** @var  CnUserRepository */
    private $cnUserRepository;

    public function __construct(CnUserRepository $cnUserRepo)
    {
        $this->cnUserRepository = $cnUserRepo;
    }

    /**
     * Display a listing of the CnUser.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cnUserRepository->pushCriteria(new RequestCriteria($request));
        $cnUsers = $this->cnUserRepository->all();

        return view('cn_users.index')
            ->with('cnUsers', $cnUsers);
    }

    /**
     * Show the form for creating a new CnUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('cn_users.create');
    }

    /**
     * Store a newly created CnUser in storage.
     *
     * @param CreateCnUserRequest $request
     *
     * @return Response
     */
    public function store(CreateCnUserRequest $request)
    {
        $input = $request->all();

        $cnUser = $this->cnUserRepository->create($input);

        Flash::success('Cn User saved successfully.');

        return redirect(route('cnUsers.index'));
    }

    /**
     * Display the specified CnUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cnUser = $this->cnUserRepository->findWithoutFail($id);

        if (empty($cnUser)) {
            Flash::error('Cn User not found');

            return redirect(route('cnUsers.index'));
        }

        return view('cn_users.show')->with('cnUser', $cnUser);
    }

    /**
     * Show the form for editing the specified CnUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cnUser = $this->cnUserRepository->findWithoutFail($id);

        if (empty($cnUser)) {
            Flash::error('Cn User not found');

            return redirect(route('cnUsers.index'));
        }

        return view('cn_users.edit')->with('cnUser', $cnUser);
    }

    /**
     * Update the specified CnUser in storage.
     *
     * @param  int              $id
     * @param UpdateCnUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCnUserRequest $request)
    {
        $cnUser = $this->cnUserRepository->findWithoutFail($id);

        if (empty($cnUser)) {
            Flash::error('Cn User not found');

            return redirect(route('cnUsers.index'));
        }

        $cnUser = $this->cnUserRepository->update($request->all(), $id);

        Flash::success('Cn User updated successfully.');

        return redirect(route('cnUsers.index'));
    }

    /**
     * Remove the specified CnUser from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cnUser = $this->cnUserRepository->findWithoutFail($id);

        if (empty($cnUser)) {
            Flash::error('Cn User not found');

            return redirect(route('cnUsers.index'));
        }

        $this->cnUserRepository->delete($id);

        Flash::success('Cn User deleted successfully.');

        return redirect(route('cnUsers.index'));
    }
}
