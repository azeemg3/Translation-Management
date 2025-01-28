<?php

namespace App\Interfaces;

interface TranslateInterface
{
    public function index($request);
    public function store(array $data);
    public function edit($id);
    public function show($id);
    public function update($id,array $data);
    public function delete($id); 
}
