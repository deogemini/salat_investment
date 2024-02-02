<?php

namespace App\Http\Controllers;

use App\Models\GharamazaMashamba;
use App\Models\Mashamba;
use Illuminate\Http\Request;

class MashambaController extends Controller
{
    public function index(){
        $mashamba = Mashamba::all();
        return view('mashamba.index', compact('mashamba'));
    }
    public function indexGharamaZaMashamba(){
        $gharama_za_mashamba = GharamazaMashamba::all();
        $mashamba = Mashamba::all();
        return view('mashamba.gharamazamashamba.index', compact('gharama_za_mashamba', 'mashamba'));
    }

    public function create(Request $request){
        $mashamba_id =  $request->input('mashamba_id');
        $kusafisha_shamba =  $request->input('kusafisha_shamba');
        $kulima_shamba =  $request->input('kulima_shamba');
        $mbegu_za_shamba =  $request->input('mbegu_za_shamba');
        $kupanda_shamba =  $request->input('kupanda_shamba');
        $kupalilia_shamba =  $request->input('kupalilia_shamba');
        $mifuko_ya_mbolea =  $request->input('mifuko_ya_mbolea');
        $gharama_za_mbolea =  $request->input('gharama_za_mbolea');
        $nauli_pikipiki =  $request->input('nauli_pikipiki');
        $wafanyakazi =  $request->input('wafanyakazi');
        $muda_msimu_mwaka =  $request->input('muda_msimu_mwaka');

        $total = ($kusafisha_shamba + $kulima_shamba+ $mbegu_za_shamba + $kupalilia_shamba + $kupanda_shamba +$nauli_pikipiki + $wafanyakazi + $gharama_za_mbolea);

        $gharamaZaMashamba = New GharamazaMashamba();
        $gharamaZaMashamba->mashamba_id = $mashamba_id;
        $gharamaZaMashamba->kusafisha_shamba = $kusafisha_shamba;
        $gharamaZaMashamba->kulima_shamba = $kulima_shamba;
        $gharamaZaMashamba->kupanda_shamba = $kupanda_shamba;
        $gharamaZaMashamba->kupalilia_shamba = $kupalilia_shamba;
        $gharamaZaMashamba->mbegu_za_shamba = $mbegu_za_shamba;
        $gharamaZaMashamba->mifuko_ya_mbolea = $mifuko_ya_mbolea;
        $gharamaZaMashamba->gharama_za_mbolea = $gharama_za_mbolea;
        $gharamaZaMashamba->nauli_pikipiki = $nauli_pikipiki;
        $gharamaZaMashamba->wafanyakazi = $wafanyakazi;
        $gharamaZaMashamba->muda_msimu_mwaka = $muda_msimu_mwaka;

        $gharamaZaMashamba->total = $total;

        $gharamaZaMashamba->save();
        // Redirect or return a response as needed
        return redirect()->route('gharama_mashamba.index')->with('success', 'Category added successfully');
    }

            public function store(Request $request){
            // Validation
            $request->validate([
                'location' => 'required|string|max:255',
                'buying_cost' => 'nullable|string|max:255',
                'size' => 'nullable|string|max:255',
                'date_of_buying' => 'nullable|string|max:255',
            ]);

            // Save category to the database or perform other actions
            // For simplicity, let's assume you have a Category model and table
            Mashamba::create($request->all());

            // Redirect or return a response as needed
            return redirect()->route('mashamba.index')->with('success', 'Category added successfully');
        }


        public function ongezaGharama(Request $request){
            $mashambaId = $request->input('mashamba_id');
            $selectedParameter = $request->input('gharama_husika');
            $thamani_yenyewe= $request->input('thamani_yenyewe');

            $gharamazashamba = GharamazaMashamba::find($mashambaId);

            if ($gharamazashamba) {
                $gharamazashamba->total =   $gharamazashamba->total +  $thamani_yenyewe;

                if ($gharamazashamba && in_array($selectedParameter, $gharamazashamba->getFillable())) {

                    $gharamazashamba->$selectedParameter = $thamani_yenyewe +  $gharamazashamba->$selectedParameter;
                    $gharamazashamba->save();
                }
            }

            return redirect()->route('gharama_mashamba.index')->with('success', 'Category added successfully');


        }

        public function update(Request $request)
        {
            $mashamba = Mashamba::find($request->id);
            $mashamba ->update($request->all());

            return redirect()->route('mashamba.index')->with('success', 'Category added successfully');


        }
}
