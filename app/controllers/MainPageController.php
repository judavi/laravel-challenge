<?php

class MainPageController extends BaseController{

    protected $entriesRepository;
    protected $usersRepository;

    function __construct(EntriesRepository $entriesRepository, UsersRepository $usersRepository)
    {
        $this->entriesRepository = $entriesRepository;
        $this->usersRepository = $usersRepository;
    }


    public function index(){
        $users = $this->usersRepository->allUsersId();
        $latest_entries = $this->entriesRepository->getLatestThreeEntriesByUser($users);

        return View::make('main_page', compact(['latest_entries']));
    }
}