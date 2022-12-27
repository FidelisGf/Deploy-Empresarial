<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTagValidator;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index(TagRepository $tagRepository)
    {
        return $tagRepository->index();
    }
    public function store(StoreTagValidator $request, TagRepository $tagRepository)
    {
       return $tagRepository->store($request);
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
