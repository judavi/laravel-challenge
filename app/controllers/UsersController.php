<?php

class UsersController extends \BaseController {

    protected $usersRepository;
    protected $entriesRepository;

    function __construct(
        UsersRepository $usersRepository,
        EntriesRepository $entriesRepository
    )
    {
        $this->usersRepository = $usersRepository;
        $this->entriesRepository = $entriesRepository;
        }

    /**
     * Show the form for creating a new User.
     * GET /users/create
     *
     * @return Response
     */
    public function register()
    {
        return View::make('users.create');
    }

    /**
     * Store a newly created User in storage.
     * POST /users
     *
     * @return Response
     */
    public function signUp()
    {
        $manager = new RegisterUserManager(new User(), Input::instance());

        $manager->save();

        Auth::loginUsingId($manager->getModel()->id);

        return Redirect::route('users.show', [$manager->getModel()->slug]);
    }


    /**
     * Display the specified User.
     * GET /users/{slug}
     *
     * @param  string $slug
     * @return Response
     */
    public function show($slug)
    {
        $user = $this->usersRepository->findByUserName($slug);
        $entries = $this->entriesRepository->getAllByAuthor($user->id);

        return View::make('users.show', compact(['user', 'entries']));
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
        $user = $this->usersRepository->find($id);

        return View::make('users.edit', compact('user'));
    }

    /**
     * Update the specified User in storage.
     * PUT /users/{id}
     *
     * @param  int $id
     * @return Redirect
     */
    public function update($id)
    {
        if(Request::ajax()){
            $user = $this->usersRepository->find($id);
            $manager = new UpdateUserManager($user, Input::instance());
            $manager->save();

            $notification = 'Success, user information update';

            return $this->sendJsonResponse(true, $notification, URL::route('users.show', [$manager->getModel()->slug]));
        }
    }

    public function updatePassword($id)
    {
        if(Request::ajax()) {

            $user = $this->usersRepository->find($id);

            $manager = new UpdateUserPasswordManager($user, Input::instance());
            $manager->save();

            $notification = 'Success, password changed';

            return $this->sendJsonResponse(true, $notification, URL::route('users.show', [$manager->getModel()->slug]));
        }
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
        User::destroy($id);

        return Redirect::route('index');
    }

    public function twitterTimeline($twitter_account){
        return Twitter::getUserTimeline(array('screen_name' => $twitter_account, 'count' => 5, 'format' => 'json'));

    }


}