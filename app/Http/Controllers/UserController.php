<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Person;
use App\Models\ProductBrand;
use App\Models\Role;
use App\Repositories\UserRepository;
use App\User;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->userRepository->pushCriteria(new RequestCriteria($request));
        $users = $this->userRepository->with('roles')
            ->paginate(30);

        return view('users.index')
            ->with(compact('users'));
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {

        $roles = Role::all()->pluck('title', 'id');
        $people = Person::all()->pluck('full_name', 'id');
        $brands = ProductBrand::all()->pluck('descripcion', 'id');
        $user = new User();

        return view('users.create', compact('roles', 'user', 'people', 'brands'));
    }

    /**
     * Store a newly created User in storage.s
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->create($input);

        Flash::success('Usuario guardado exitosamente.');
        Flash::important();

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('users.index'));
        }

        $roles = Role::all()->pluck('title', 'id');
        $people = Person::all()->pluck('full_name', 'id');
        $brands = ProductBrand::all()->pluck('descripcion', 'id');

        return view('users.edit')->with(compact('user', 'roles', 'people', 'brands'));
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('Usuario no encontrado.');

            return redirect(route('users.index'));
        }

        $input = $request->except('_token');

        if (empty($input['password']))
            unset($input['password']);

        $user = $this->userRepository->update($request->all(), $id);

        if ($role = Role::find($request->get('role'))->first()) {
            $user->assign($role);
        }

        Flash::success('Usuario actualizado exitosamente.');
        Flash::important();

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('Usuario no encontrado.');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('Usuario eliminado exitosamente.');
        Flash::important();

        return redirect(route('users.index'));
    }
}
