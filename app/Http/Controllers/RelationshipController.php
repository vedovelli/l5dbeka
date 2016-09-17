<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Customer;
use App\Address;
use App\Telephone;
use App\Tag;
// use App\Employee;
// use App\Salary;
// use App\User;
// use App\CustomerTag;

class RelationshipController extends Controller
{
    private function view($variables) {
        return view('relationships.index')->with($variables);
    }

    public function oneToOne()
    {
        $title = 'One To One';
        $route='';
        $collection = Customer::with('address')->get();

        // if (true) {
        //     $collection->load('address');
        // }

        return $this->view(compact('collection', 'title', 'route'));
    }

    public function oneToMany()
    {
        $title = 'One To Many';
        $route='one.to.many.post';
        // $collection = Telephone::with('customer')->where('id', 1)->get();
        $collection = Customer::with(['address', 'telephones'])->get();

        // $collection->load(['telephones' => function ($query) {
        //     $query->where('type', 'mobile');
        // }]);

        return $this->view(compact('collection', 'title', 'route'));
    }

    public function oneToManyPost()
    {
        $customer = Customer::first();

        $telephone = new Telephone();
        $telephone->number = '342183901823901';
        $telephone->type = 'land';

        $customer->telephones()->save($telephone);

        return redirect()->back();
    }

    public function manyToMany()
    {
        $title = 'Many To Many';
        $route = '';

        // $collection = Tag::find(5);

        // $collection->load('customers');

        $collection = Customer::with(['tags' => function ($query) {
            $query->distinct();
        }])->get();

        return $this->view(compact('collection', 'title', 'route'));
    }
}
