<?php

namespace App\Models\Relation\Traits;

/**
 * Class RelationAttribute.
 */
trait RelationAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                ' . $this->getEditButtonAttribute("edit-relation", "admin.relations.edit") . '
                ' . $this->getDeleteButtonAttribute("delete-relation", "admin.relations.destroy") . '
                </div>';
    }
}
