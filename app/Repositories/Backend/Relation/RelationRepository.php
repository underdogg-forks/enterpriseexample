<?php

namespace App\Repositories\Backend\Relation;

use App\Exceptions\GeneralException;
use App\Models\Relation\Relation;
use App\Repositories\BaseRepository;
use DB;

/**
 * Class RelationRepository.
 */
class RelationRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Relation::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.relations.table') . '.id',
                config('module.relations.table') . '.created_at',
                config('module.relations.table') . '.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if ($Relation::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.relations.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Relation $relation
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Relation $relation, array $input)
    {
        if ($relation->update($input)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.relations.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Relation $relation
     * @throws GeneralException
     * @return bool
     */
    public function delete(Relation $relation)
    {
        if ($relation->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.relations.delete_error'));
    }
}
