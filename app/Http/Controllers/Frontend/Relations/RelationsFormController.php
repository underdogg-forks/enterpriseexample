<?php

namespace App\Http\Controllers\Frontend\Relations;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Menu\CreateMenuRequest;

class RelationsFormController extends Controller
{
    /**
     * Get the form for modal popup.
     *
     * @param string $formName
     * @param \App\Http\Requests\Backend\Menu\CreateMenuRequest
     *
     * @return \Illuminate\Http\Response
     */
    public function create($formName, CreateMenuRequest $request)
    {
        if (in_array($formName, ['_add_relation_form'])) {
            return view('backend.relations.' . $formName);
        }

        return abort(404);
    }
}
