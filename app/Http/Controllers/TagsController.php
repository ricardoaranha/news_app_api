<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagsRequest;
use App\Models\Tags;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    private $model;

    public function __construct(Tags $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        
    }

    public function details($id)
    {
        $record = $this->model->findOrFail($id);

        return response($record, '200');
    }

    public function create(TagsRequest $request)
    {

    }

    public function update(TagsRequest $request, $id)
    {

    }

    public function delete($id)
    {
        $record = $this->model->findOrFail($id);
        $record->delete();

        return response('Tag successfully deleted.', 200);
    }
}
