<?php

namespace App\Repostries;

use App\Interfaces\TranslateInterface;
use App\Models\Translation;
use ErrorException;
use Illuminate\Database\QueryException;

class TranslateRepository implements TranslateInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function index($request)
    {
        $query=Translation::query();
        if ($request->has('translate_key')) {
            $query->where('translate_key', $request->input('translate_key'));
        }
        if ($request->has('tags')) {
            $query->whereJsonContains('tags', $request->input('tags'));
        }
        if ($request->has('content')) {
            $query->where('content', 'LIKE', '%' . $request->input('content') . '%');
        }
        $result=$query->orderBy("id", "desc")->paginate(100);
        return $result;
    }
    public function store(array $data)
    {
        try {
            $translation = Translation::create($data);
            return response()->json([
                'message' => 'Record Added Successfully',
                'data' => $translation
            ], 200);
        } catch (QueryException $e) {
            throw new ErrorException($e->getMessage());
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }
    public function show($id)
    {
        return Translation::findOrFail($id);
    }
    public function update($id, array $data)
    {
        try {
            $translation = Translation::where("id", $id)->update($data);
            return response()->json([
                'message' => 'Record Updated Successfully',
                'status' => 'Success',
                'code' => 200,
            ], 200);
        } catch (QueryException $e) {
            throw new ErrorException($e->getMessage());
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }
    public function edit($id)
    {
        return Translation::findOrFail($id);
    }

    public function delete($id)
    {
        $result = Translation::destroy($id);
        if ($result) {
            return response()->json([
                'message' => 'Record Deleted Successfully...',
                'status' => 'Successfull',
                'code' => 200
            ]);
        }
    }
}
