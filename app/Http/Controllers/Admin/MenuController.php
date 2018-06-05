<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Contracts\ModelControllerInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller implements ModelControllerInterface
{

    public function __construct()
    {
    }

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store(Request $request)
    {
        // TODO: Implement store() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update(Request $request)
    {
        // TODO: Implement update() method.
    }

    public function destory($id)
    {
        // TODO: Implement destory() method.
    }
}
