<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
Use Auth;
use App\Models\Amenties;

class AmentiesController extends Controller
{
	
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$amenties = Amenties::select('id', 'name')->paginate(20);
		return view('amenties.index')->with(compact('amenties'));
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('amenties.create');
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		Validator::make($request->all(), [
			'name' => 'required|unique:amenties'
		])->validate();
		$amenties = new Amenties;
		$amenties->name = $request->get('name');
		
		
		if ($amenties->save()) {
			$request->session()->flash('status', array('title' => 'Create Amenties SuccessFully', 'type' => 'success'));
			return redirect('amenties/' . $amenties->id . '/edit');
		}
		$request->session()->flash('status', array('title' => 'Failed To Create Amenties', 'type' => 'danger'));
		return redirect('amenties/create');
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function edit($id)
	{
		$amenties = Amenties::findOrFail($id);
		return view('amenties.edit', compact('amenties'));
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param int $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		Validator::make($request->all(), [
			'name' => 'required|unique:amenties,name,' . $id
		])->validate();
		$amenties = Amenties::find($id);
		$amenties->name = $request->get('name');
		
		if ($amenties->save()) {
			$request->session()->flash('status', array('title' => ' Amenties Update SuccessFully', 'type' => 'success'));
			return redirect('amenties/' . $amenties->id . '/edit');
		}
		$request->session()->flash('status', array('title' => 'Failed To Update', 'type' => 'danger'));
		return redirect('amenties/' . $amenties->id . '/edit');
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 * @return Response
	 */
	public function destroy(Request $request, $id)
	{
		$delete = Amenties::destroy($id);
		if ($delete) {
			$request->session()->flash('status', array('title' => 'Delete Amenties SuccessFully', 'type' => 'success'));
		} else {
			$request->session()->flash('status', array('title' => 'Failed To Delete', 'type' => 'danger'));
		}
		return redirect('amenties');
	}
}
