<?php

namespace App\Http\Controllers;

use App\Http\Requests\TranslateRequest;
use App\Interfaces\TranslateInterface;
use Illuminate\Http\Request;
use App\Http\Resources\Translate;

class TranslationController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    private $translateInterface;
    public function __construct(TranslateInterface $translate)
    {
        $this->translateInterface = $translate;
    }
    public function index(Request $request) 
    {
        $data= $this->translateInterface->index($request);
        return Translate::collection($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TranslateRequest $request)
    {
        $result=$this->translateInterface->store($request->all());
        return $result;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result=$this->translateInterface->show($id);
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $result=$this->translateInterface->edit($id);
       return $result;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TranslateRequest $request, string $id)
    {
        $result=$this->translateInterface->update($id, $request->all());
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->translateInterface->delete($id);
    }
}
