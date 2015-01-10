<?php

class UsersController extends \BaseController {

    protected $usersRepository;
    protected $createUserManager;
    protected $updateUserManager;
    protected $updateUserPasswordManager;

    function __construct(
        UsersRepository $usersRepository,
        CreateUserManager $createUserManager,
        UpdateUserManager $updateUserManager,
        UpdateUserPaswordManager $updateUserPasswordManager

    )
    {
        $this->usersRepository = $usersRepository;
        $this->createUserManager = $createUserManager;
        $this->updateUserManager = $updateUserManager;
        $this->updateUserPasswordManager = $updateUserPasswordManager;
    }

    /**
     * Display a listing of the User.
     * GET /users
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new User.
     * GET /users/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created User in storage.
     * POST /users
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified User.
     * GET /users/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = $this->use
	}

    /**
     * Show the form for editing the specified User.
     * GET /users/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified User in storage.
     * PUT /users/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified User from storage.
     * DELETE /users/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}