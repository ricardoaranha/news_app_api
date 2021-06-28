<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Resources\NewsResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    private $model;

    public function __construct(News $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        $filters = $request->get('filters');
        $order = $request->get('order', 'created_at');
        $sort = $request->get('sort', 'desc');
        $newsPerPage = $request->get('news_per_page', 2);

        $record = $this->model->with('tags')->where('is_published', 0);

        /* if($filters != null) 
        {
            $record->where();
        } */

        $record = $record->orderBy($order, $sort)->paginate($newsPerPage);

        return (NewsResource::collection($record))->response()->setStatusCode(200);
    }

    public function details($id)
    {
        $record = $this->model->with('tags')->findOrFail($id);

        return response($record, '200');
    }

    public function create(Request $request)
    {
        $data = $request->only($this->model->getFillable());

        DB::beginTransaction();

        try 
        {
            $record = $this->model->create($data);
            
            if($request->file('banner_image'))
            {
                $record->banner = $request->file('banner_image')->store('banners', 'public');
            }

            $record->save();

            DB::commit();
        } 
        catch (\Exception $e) 
        {
            DB::rollBack();
            throw $e;
        }

        return response('News successfully created.', 200);
    }

    public function update(Request $request, $id)
    {
        $record = $this->model->findOrFail($id);
        $data = $request->only($this->model->getFillable());
        dd($data);
        DB::beginTransaction();

        try 
        {
            $record->fill($data);
            
            if($request->hasFile('banner_image'))
            {
                $path = public_path()."/storage/$record->banner";
                $path = str_replace('\\', '/', $path);
                Storage::delete($path);
                $record->banner = $request->file('banner_image')->store('banner', 'public');
            }

            $record->save();

            DB::commit();
        } 
        catch (\Exception $e) 
        {
            DB::rollBack();
            throw $e;
        }

        return response('News successfully updated.', 200);
    }

    public function delete($id)
    {
        $record = $this->model->findOrFail($id);
        $record->delete();

        return response('News successfully deleted.', 200);
    }
}
