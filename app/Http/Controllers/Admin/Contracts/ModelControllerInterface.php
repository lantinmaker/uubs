<?php

namespace App\Http\Controllers\Admin\Contracts;

use Illuminate\Http\Request;

interface ModelControllerInterface
{

    public function index();
    public function edit($id);
    public function update(Request $request);
    public function create();
    public function store(Request $request);
    public function destory($id);
}
