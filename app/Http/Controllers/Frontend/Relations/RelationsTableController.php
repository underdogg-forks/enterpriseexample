<?php

namespace App\Http\Controllers\Frontend\Relations;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Relation\ManageRelationRequest;
use App\Repositories\Backend\Relation\RelationRepository;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class RelationsTableController.
 */
class RelationsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var RelationRepository
     */
    protected $relation;

    /**
     * contructor to initialize repository object
     * @param RelationRepository $relation ;
     */
    public function __construct(RelationRepository $relation)
    {
        $this->relation = $relation;
    }

    /**
     * This method return the data of the model
     * @param ManageRelationRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageRelationRequest $request)
    {
        return Datatables::of($this->relation->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('name', function ($relation) {
                return ucwords($relation->name);
            })
            ->addColumn('created_at', function ($relation) {
                return Carbon::parse($relation->created_at)->toDateString();
            })
            ->addColumn('updated_at', function ($relation) {
                return Carbon::parse($relation->updated_at)->toDateString();
            })
            ->addColumn('actions', function ($relation) {
                return $relation->action_buttons;
            })
            ->make(true);
    }
}
