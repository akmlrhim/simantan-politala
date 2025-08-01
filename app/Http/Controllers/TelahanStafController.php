<?php

namespace App\Http\Controllers;

use App\Models\TelahanStaf;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTelahanStafRequest;
use App\Http\Requests\UpdateTelahanStafRequest;
use App\Models\Jabatan;
use App\Models\JenisSurat;
use App\Models\SuratMasuk;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Facades\Purifier;

class TelahanStafController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Telahan Staf';
        $data = DB::table('surat_masuk')->paginate(10);

        return view('telahan_staf.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $title = 'Tambah Telahan Staf';
        $suratMasuk = SuratMasuk::findOrFail($id);
        $jabatan = Jabatan::pluck('nama', 'id');
        $jenisSurat = JenisSurat::pluck('nama', 'id');

        return view('telahan_staf.create', compact(
            'title',
            'suratMasuk',
            'jabatan',
            'jenisSurat'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTelahanStafRequest $request)
    {
        DB::beginTransaction();

        try {
            TelahanStaf::create([
                'surat_masuk_id' => $request->surat_masuk_id,
                'dari' => $request->dari,
                'perihal' => $request->perihal,
                'isi'  => Purifier::clean($request->isi, 'custom-table'),
                'fakta_data'  => Purifier::clean($request->fakta_data, 'custom-table'),
                'saran_tindak' => Purifier::clean($request->saran_tindak, 'custom-table'),
                'created_by' => Auth::id()
            ]);

            SuratMasuk::where('id', $request->surat_masuk_id)
                ->update(['status' => 'Selesai']);

            DB::commit();
            return redirect()->route('telahan-staf.index')->with('success', 'Telahan staf berhasil dibuat !');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan !');
        }
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
    public function edit($id)
    {
        $title = 'Edit Telahan Staf';
        $telahanStaf = TelahanStaf::findOrFail($id);

        $existing = TelahanStaf::where('surat_masuk_id', $telahanStaf->first());
        $jabatan = Jabatan::pluck('nama', 'id');
        $jenisSurat = JenisSurat::pluck('nama', 'id');
        $suratMasuk = SuratMasuk::find($telahanStaf->surat_masuk_id);

        return view('telahan_staf.edit', compact(
            'title',
            'telahanStaf',
            'jabatan',
            'jenisSurat',
            'suratMasuk'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTelahanStafRequest $request, $id)
    {
        $telahanStaf = TelahanStaf::findOrFail($id);

        DB::beginTransaction();

        try {
            $telahanStaf->update([
                'dari' => $request->dari,
                'perihal' => $request->perihal,
                'isi'  => Purifier::clean($request->isi, 'custom-table'),
                'fakta_data'  => Purifier::clean($request->fakta_data, 'custom-table'),
                'saran_tindak' => Purifier::clean($request->saran_tindak, 'custom-table'),
            ]);

            DB::commit();
            return redirect()->route('telahan-staf.index')->with('success', 'Telahan staf berhasil diubah !');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TelahanStaf $telahanStaf)
    {
        //
    }
}
