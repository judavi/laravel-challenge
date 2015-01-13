<?php

class EntriesController extends \BaseController {

	protected $entriesRepository;

	function __construct(EntriesRepository $entriesRepository)
	{
		$this->entriesRepository = $entriesRepository;
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


		return Redirect::route('entries.show', [$manager->getModel()->slug]);
	}

	/**
	 * Display the specified resource.
	 * GET /entries/{slug}
	 *
	 * @param  string  $slug
	 * @return Response
	 */
	public function show($slug)
	{
		$entry = Entry::where('slug','=',$slug)->first();

		return View::make('entries.show', compact(['entry']));
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


		$entry = Entry::findOrFail($id);

		return View::make('entries.edit', compact(['entry']));
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
		$manager = new UpdateEntryManager(Entry::find($id), Input::instance());
		$manager->save();

		return Redirect::route('entries.show', [$manager->getModel()->slug]);
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
		$entry = Entry::find($id);
		Entry::destroy($id);

		return Redirect::route('users.show', [$entry->author->slug]);
	}

}