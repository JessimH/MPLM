<?php

namespace App\Http\Controllers;

use App\Models\Sneaker;
use App\Models\Modele;
use App\Models\File;
use App\Models\Marque;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SneakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, Request $request)
    {
        
        if($request->modele){
            $modele = $request->modele;
            $color = $request->color;
            $modeleDb = Modele::where('name', $modele)->first();
            $sneaker = Sneaker::where('modeles_id', $modeleDb->id)->where('color', $color)->first();
            // dd($sneaker->id);
        }else{
            $sneaker = Sneaker::where('id', $id)
            ->first();
        }
        

        if($sneaker){
            $result = $sneaker;
            $result_images = rtrim($result->filenames, ' ]');
            $result_images = substr($result_images, 1);
            $result_images = explode(",", $result_images);
            $images = [];
            foreach ($result_images as $image){
                $image = rtrim($image, '"');
                $image = substr($image, 1);
                array_push($images, $image);
            }
            // $images = $result->filenames;
            // dd($images);

            $modele = Modele::where('id', $sneaker->modeles_id)->first();
            $sneakers = Sneaker::where('modeles_id', $modele->id)
            ->get();
            $colors= array();
            for($i = 0; $i < count($sneakers); $i++){
                $found_key = array_search($sneakers[$i]->color, $colors);
                if($found_key){
                    continue;
                }
                else{
                    array_push($colors, $sneakers[$i]->color);
                }
            }

            $marques = Marque::orderBy('name')->get();
            $modeles = Modele::orderBy('name')->get();

            return view('sneaker', compact('sneaker', 'images', 'colors', 'marques', 'modeles'));
        }
        else{
            return redirect('/')
                ->with('error','Aucune sneaker trouvé pour la référence donnée.');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $modeles = Modele::orderBy('name')->get();
        $sneakers = Sneaker::orderBy('name')->get();
        $marques = Marque::orderBy('name')->get();

        return view('addSneaker', compact(['modeles', 'sneakers', 'marques']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'color' => 'required',
            'modele' => 'required',
            'marque' => 'required',
            'filenames' => 'required',
            'filenames.*' => 'mimes:png,jpeg,jpg,svg'
        ]);

        $marque_id = intval($request['marque']);
        $modele_id = intval($request['modele']);

        // dd($marque_id, $modele_id);

        $sneaker = new Sneaker();
        $sneaker->name = $request['name'];
        $sneaker->color = $request['color'];
        $sneaker->marques_id = $marque_id;
        $sneaker->modeles_id = $modele_id;
        $sneaker->bestseller = false;
        // dd($modele_id);
        $sneaker->save();

        $dernierSneaker = Sneaker::latest()->first();

        $i = 0;
        $id = $dernierSneaker->id;
        foreach ($request->file('filenames') as $file) {
            $name = $dernierSneaker['id'].$i.'.'.$file->extension();
            $file->move(public_path().'/images/', $name);
            $data[] = $name;
            $i += 1;
        }

        $updateSneaker = Sneaker::where('id', $id)
                        ->first(); // this point is the most important to change
        $updateSneaker->filenames = $data;
        $updateSneaker->photo = $data[0];
        $updateSneaker->save();

        $file= new File();
        $file->filenames=json_encode($data);
        $file->save();

        return redirect('/admin/sneakers')
                ->with('success','Votre Sneaker à bien été ajouté.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sneakers  $sneakers
     * @return \Illuminate\Http\Response
     */
    public function show(Sneaker $sneakers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sneakers  $sneakers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sneaker = Sneaker::where('id', $id)->first();
        $modeles = Modele::orderBy('name')->get();
        $marques = Marque::orderBy('name')->get();

        // dd($sneaker->name);

        return view('updateSneaker', compact(['modeles', 'sneaker', 'marques']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sneakers  $sneakers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'color' => 'required',
            'modele' => 'required',
            'marque' => 'required',
            'filenames' => 'required',
            'filenames.*' => 'mimes:png,jpeg,jpg,svg'
        ]);
        // dd($id);
        // dd($request['marque']);
        $marque_id = intval($request['marque']);
        $modele_id = intval($request['modele']);
        // dd($marque_id);
        $sneaker = Sneaker::where('id', $id)->first();
        $sneaker->name = $request->name;
        $sneaker->color = $request->color;
        $sneaker->modeles_id = $modele_id;
        $sneaker->marques_id = $marque_id;

        $i = 0;
        $id = $sneaker->id;
        foreach ($request->file('filenames') as $file) {
            $name = $sneaker['id'].$i.'.'.$file->extension();
            $file->move(public_path().'/images/', $name);
            $data[] = $name;
            $i += 1;
        }

        $updateSneaker = Sneaker::where('id', $id)
                        ->first(); // this point is the most important to change
        $updateSneaker->filenames = $data;
        $updateSneaker->photo = $data[0];

        $file= new File();
        $file->filenames=json_encode($data);
        $file->save();

        $sneaker->save();
        return redirect('/admin/sneakers')
        ->with('success','Votre Sneaker à bien été modifié!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sneakers  $sneakers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $snkrToDelete = Sneaker::where('id', $id)->get();

        if(count($snkrToDelete)>0){
            Sneaker::where('id', $id )->delete();

            return redirect('/admin/sneakers')->with('success','Votre Sneaker a bien été suprimé de la Base de données !');
        }
        else{
            return redirect('/admin/sneakers')->with('error','La sneaker est introuvable, contactez votre administrateur de base de données.');
        } 
        
    }
}
