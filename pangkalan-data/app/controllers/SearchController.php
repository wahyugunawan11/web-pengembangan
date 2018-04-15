<?php

class SearchController extends BaseController{
	public function autocomplete(){
		$term = Input::get('term');
	
		$results = array();
		
		$queries = DB::table('users')
			->where('first_name', 'LIKE', '%'.$term.'%')
			->orWhere('last_name', 'LIKE', '%'.$term.'%')
			->take(5)->get();
		
		foreach ($queries as $query)
		{
		    $results[] = [ 'id' => $query->idusers, 'value' => $query->first_name.' '.$query->last_name ];
		}
		return Response::json($results);
	}
	public function cari(){
		return View::make('contoh.contoh');
	}
}