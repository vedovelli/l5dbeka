<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
// use App\Customer;
// use App\Employee;
// use App\Salary;
// use App\User;
// use App\Address;
// use App\Telephone;
// use App\CustomerTag;
// use App\Tag;

class RelationshipController extends Controller
{
    private function view($variables) {
        return view('relationships.index')->with($variables);
    }

    public function oneToOne()
    {
        $title = 'One To One';
        $route='';
        $collection = collect([]);
        return $this->view(compact('collection', 'title', 'route'));
    }

    public function oneToMany()
    {
        $title = 'One To Many';
        $route='';
        $collection = collect([]);
        return $this->view(compact('collection', 'title', 'route'));
    }

    public function manyToMany()
    {
        $title = 'Many To Many';
        $route = '';
        $collection = collect([]);
        return $this->view(compact('collection', 'title', 'route'));
    }
}
