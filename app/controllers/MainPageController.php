<?php

class MainPageController extends BaseController{
    
    protected $entriesRepository;

    function __construct(EntriesRepository $entriesRepository)
    {
        $this->entriesRepository = $entriesRepository;
    }

    public function index(){

        //$entries = $this->entriesRepository->getLatestThreeEntriesByUser();
        $entries = $this->entriesRepository->allEntries();
        //$entries = Entry::groupBy('author_id')->orderBy('created_at', 'DESC')->get();

        return View::make('main_page', compact(['entries']));
    }

    public function search($value)
    {
        return Response::json(Entry::where('name', 'LIKE', "%$value%")
            ->get());
    }

}