<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersAppRequest;
use App\Http\Requests\UpdateUsersAppRequest;
use App\Repositories\UsersAppRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UsersAppController extends AppBaseController
{
    /** @var  UsersAppRepository */
    private $usersAppRepository;

    public function __construct(UsersAppRepository $usersAppRepo)
    {
        $this->usersAppRepository = $usersAppRepo;
    }

    /**
     * Display a listing of the UsersApp.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->usersAppRepository->pushCriteria(new RequestCriteria($request));
        $usersApps = $this->usersAppRepository->all();

        return view('users_apps.index')
            ->with('usersApps', $usersApps);
    }

    /**
     * Show the form for creating a new UsersApp.
     *
     * @return Response
     */
    public function create()
    {
        return view('users_apps.create');
    }

    /**
     * Store a newly created UsersApp in storage.
     *
     * @param CreateUsersAppRequest $request
     *
     * @return Response
     */
    public function store(CreateUsersAppRequest $request)
    {
        $input = $request->all();

        $usersApp = $this->usersAppRepository->create($input);

        Flash::success('Users App saved successfully.');

        return redirect(route('usersApps.index'));
    }

    /**
     * Display the specified UsersApp.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $usersApp = $this->usersAppRepository->findWithoutFail($id);

        if (empty($usersApp)) {
            Flash::error('Users App not found');

            return redirect(route('usersApps.index'));
        }

        return view('users_apps.show')->with('usersApp', $usersApp);
    }

    /**
     * Show the form for editing the specified UsersApp.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $usersApp = $this->usersAppRepository->findWithoutFail($id);

        if (empty($usersApp)) {
            Flash::error('Users App not found');

            return redirect(route('usersApps.index'));
        }

        return view('users_apps.edit')->with('usersApp', $usersApp);
    }

    /**
     * Update the specified UsersApp in storage.
     *
     * @param  int              $id
     * @param UpdateUsersAppRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUsersAppRequest $request)
    {
        $usersApp = $this->usersAppRepository->findWithoutFail($id);

        if (empty($usersApp)) {
            Flash::error('Users App not found');

            return redirect(route('usersApps.index'));
        }

        $usersApp = $this->usersAppRepository->update($request->all(), $id);

        Flash::success('Users App updated successfully.');

        return redirect(route('usersApps.index'));
    }

    /**
     * Remove the specified UsersApp from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usersApp = $this->usersAppRepository->findWithoutFail($id);

        if (empty($usersApp)) {
            Flash::error('Users App not found');

            return redirect(route('usersApps.index'));
        }

        $this->usersAppRepository->delete($id);

        Flash::success('Users App deleted successfully.');

        return redirect(route('usersApps.index'));
    }
}
