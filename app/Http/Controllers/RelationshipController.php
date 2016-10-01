<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Customer;
use App\Address;
use App\Telephone;
use App\Tag;
use App\User;

class RelationshipController extends Controller
{
    private function view($variables) {
        return view('relationships.index')->with($variables);
    }

    public function oneToOne()
    {
        $title = 'One To One';
        $route='one.to.one.insert';
        $collection = Customer::with('address')->get();

        // if (true) {
        //     $collection->load('address');
        // }

        return $this->view(compact('collection', 'title', 'route'));
    }

    public function oneToOneInsert()
    {
        $data = [
            'name' => 'Nome do fulano',
            'email' => 'nome@fulano.com.br',
            'birth_date' => '1988-01-01',
            'country_id' => 3,
        ];
        $customer = Customer::create($data);

        $data = [
            'number' => '(11) 3445-0987',
            'type' => 'land',
        ];

        $customer->telephones()->create($data);

        $customer->load('telephones');

        return redirect()->route('one.to.one');
    }

    public function oneToMany()
    {
        $title = 'One To Many';
        $route='one.to.many.post';
        // $collection = Telephone::with('customer')->where('id', 1)->get();
        $collection = Customer::with('address')->get();

        $collection->load(['telephones' => function ($query) {
            $query->where('number', 'like', '%34218%');
            // $query->where('type', 'mobile');
        }]);

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
        $route = 'many.to.many.insert';

        // $collection = Tag::find(5);

        // $collection->load('customers');

        $collection = Customer::with(['tags' => function ($query) {
            $query->distinct();
        }])->first();

        return $this->view(compact('collection', 'title', 'route'));
    }

    public function manyToManyInsert()
    {
        $tag = new Tag();
        $tag->name = 'Popular';
        $tag->save();

        $customer = Customer::with('tags')->find(3);
        $customer->tags()->attach($tag);

        return redirect()->route('many.to.many');
    }

    public function hasManyThrough()
    {
        $title = 'Has Many Through';
        $route = '';
        $collection = collect([]);
        return $this->view(compact('collection', 'title', 'route'));
    }

    public function polymorphic()
    {
        $title = 'Polymorphic';
        $route = '';
        $collection = collect([]);
        return $this->view(compact('collection', 'title', 'route'));
    }
}
