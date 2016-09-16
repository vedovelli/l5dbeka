<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Customer;
use App\Employee;
use App\Salary;
use App\User;
use App\Address;
use App\Telephone;
use App\CustomerTag;
use App\Tag;

class RelationshipController extends Controller
{
    private function view($variables) {
        return view('relationships.index')->with($variables);
    }

    public function oneToOne()
    {
        $title = 'One To One';
        $route='';
        $collection = Customer::take(20)->with('address')->get();
        return $this->view(compact('collection', 'title', 'route'));
    }

    public function oneToMany()
    {
        $title = 'One To Many';
        $route='add.one.to.many';
        $collection = Customer::with('address', 'telephones')->get();
        $collection[1]->load(['telephones' => function ($query) {
            $query->where('type', 'mobile');
        }]);
        return $this->view(compact('collection', 'title', 'route'));
    }

    public function addOneToMany()
    {
        $customer = factory(Customer::class)->create();
        $customer->address()->save(factory(Address::class)->make());
        for ($i=0; $i < 3; $i++) {
            $customer->telephones()->save(factory(Telephone::class)->make());
        }
        return redirect()->back();
    }

    public function manyToMany()
    {
        $title = 'Many To Many';
        $route = 'add.many.to.many';
        // $collection = Tag::with('customers')->get()[4];
        $collection = Customer::with(['tags' => function ($query) {
            $query->distinct();
        }])->orderBy('id', 'desc')->first();
        $collection->load(['address', 'telephones']);
        return $this->view(compact('collection', 'title', 'route'));
    }

    public function addManyToMany()
    {
        $customer = Customer::with(['tags' => function ($query) {
            $query->distinct();
        }])->orderBy('id', 'desc')->first();

        $tags = Tag::where('id', '>', '2')->get(['id'])->pluck('id');

        $customer->tags()->sync($tags->toArray());

        return redirect()->back();
    }

    public function hasManyThrough()
    {
        $title = 'Has Many Through';
        $route='';
        $collection = ['placeholder' => 'for something valuable'];
        return $this->view(compact('collection', 'title', 'route'));
    }

    public function polymorphic()
    {
        $title = 'Polymorphic';
        $route='';
        $collection = ['placeholder' => 'for something valuable'];
        return $this->view($title, $collection);
    }
}
