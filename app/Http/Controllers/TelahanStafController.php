<?php

namespace App\Http\Controllers;

use App\Models\TelahanStaf;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTelahanStafRequest;
use App\Http\Requests\UpdateTelahanStafRequest;

class TelahanStafController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Telahan Staf';
        $data = DB::table('surat_masuk')
            ->select(
                'surat_masuk.id as surat_masuk_id',
                'surat_masuk.*',
                'telahan_staf.id as telahan_staf_id'
            )
            ->join('telahan_staf', 'surat_masuk.id', '=', 'telahan_staf.surat_masuk_id', 'left')
            ->paginate(10);

        return view('telahan-staf.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(TelahanStaf $telahanStaf)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTelahanStafRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TelahanStaf $telahanStaf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TelahanStaf $telahanStaf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTelahanStafRequest $request, TelahanStaf $telahanStaf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TelahanStaf $telahanStaf)
    {
        //
    }
}
