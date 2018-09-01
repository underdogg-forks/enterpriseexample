<?php

namespace App\Http\Controllers\Frontend\Relations;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Relation\CreateRelationRequest;
use App\Http\Requests\Backend\Relation\DeleteRelationRequest;
use App\Http\Requests\Backend\Relation\EditRelationRequest;
use App\Http\Requests\Backend\Relation\ManageRelationRequest;
use App\Http\Requests\Backend\Relation\StoreRelationRequest;
use App\Http\Requests\Backend\Relation\UpdateRelationRequest;
use App\Models\Relation\Relation;
use App\Repositories\Backend\Relation\RelationRepository;

/**
 * RelationsController
 */
class RelationsController extends Controller
{
    /**
     * variable to store the repository object
     * @var RelationRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param RelationRepository $repository ;
     */
    public function __construct(RelationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Relation\ManageRelationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageRelationRequest $request)
    {
        return view('frontend.relations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateRelationRequestNamespace $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateRelationRequest $request)
    {
        return view('backend.relations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRelationRequestNamespace $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRelationRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return redirect()->route('frontend.relations.relations.index')->withFlashSuccess(trans('alerts.backend.relations.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Relation\Relation $relation
     * @param  EditRelationRequestNamespace $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Relation $relation, EditRelationRequest $request)
    {
        return view('backend.relations.edit', compact('relation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRelationRequestNamespace $request
     * @param  App\Models\Relation\Relation $relation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRelationRequest $request, Relation $relation)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update($relation, $input);
        //return with successfull message
        return redirect()->route('frontend.relations.relations.index')->withFlashSuccess(trans('alerts.backend.relations.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteRelationRequestNamespace $request
     * @param  App\Models\Relation\Relation $relation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Relation $relation, DeleteRelationRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($relation);
        //returning with successfull message
        return redirect()->route('frontend.relations.relations.index')->withFlashSuccess(trans('alerts.backend.relations.deleted'));
    }

}
