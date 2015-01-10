<?php

class EntriesController extends \BaseController {

	protected $entriesRepository;

	function __construct(EntriesRepository $entriesRepository)
	{
		$this->entriesRepository = $entriesRepository;
	}

	/**
	 * Display a listing of the resource.
	 * GET /entries
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /entries/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('entries.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /entries
	 *
	 * @return Response
	 */
	public function store()
	{
		$manager = new CreateEntryManager(new Entry(), Input::instance());
		$manager->save();
	}

	/**
	 * Display the specified resource.
	 * GET /entries/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$entry = $this->entriesRepository->findByTitle($slug);

		return View::make('entries.show', compact([$entry]));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /entries/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$entry = $this->entriesRepository->findByTitle($id);

		return View::make('entries.edit', compact([$entry]));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /entries/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$manager = new CreateEntryManager($this->entriesRepository->find($id), Input::instance());
		$manager->save();
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /entries/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Entry::destroy($id);

	}

}