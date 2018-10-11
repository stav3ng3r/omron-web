<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Repositories\PersonRepository;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PersonController extends AppBaseController
{
    /** @var  PersonRepository */
    private $personRepository;

    public function __construct(PersonRepository $personRepo)
    {
        $this->personRepository = $personRepo;
    }

    /**
     * Display a listing of the Person.
     *
     * @param Request $request
     * @return Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $this->personRepository->pushCriteria(new RequestCriteria($request));
        $people = $this->personRepository->paginate(30);

        return view('people.index')
            ->with('people', $people);
    }

    /**
     * Show the form for creating a new Person.
     *
     * @return Response
     */
    public function create()
    {
        return view('people.create');
    }

    /**
     * Store a newly created Person in storage.
     *
     * @param CreatePersonRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreatePersonRequest $request)
    {
        $input = $request->all();

        $person = $this->personRepository->create($input);

        Flash::success('Persona creada exitosamente');
        Flash::important();

        return redirect(route('people.index'));
    }

    /**
     * Display the specified Person.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $person = $this->personRepository->findWithoutFail($id);

        if (empty($person)) {
            Flash::error('Persona no encontrada.');

            return redirect(route('people.index'));
        }

        return view('people.show')->with('person', $person);
    }

    /**
     * Show the form for editing the specified Person.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $person = $this->personRepository->findWithoutFail($id);

        if (empty($person)) {
            Flash::error('Persona no encontrada.');

            return redirect(route('people.index'));
        }

        return view('people.edit')->with('person', $person);
    }

    /**
     * Update the specified Person in storage.
     *
     * @param  int $id
     * @param UpdatePersonRequest $request
     *
     * @return Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update($id, UpdatePersonRequest $request)
    {
        $person = $this->personRepository->findWithoutFail($id);

        if (empty($person)) {
            Flash::error('Persona no encontrada.');

            return redirect(route('people.index'));
        }

        $person = $this->personRepository->update($request->all(), $id);

        Flash::success('Persona actualizada exitosamente');
        Flash::important();

        return redirect(route('people.index'));
    }

    /**
     * Remove the specified Person from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $person = $this->personRepository->findWithoutFail($id);

        if (empty($person)) {
            Flash::error('Persona no encontrada.');

            return redirect(route('people.index'));
        }

        $this->personRepository->delete($id);

        Flash::success('Persona eliminada exitosamente.');
        Flash::important();

        return redirect(route('people.index'));
    }
}
