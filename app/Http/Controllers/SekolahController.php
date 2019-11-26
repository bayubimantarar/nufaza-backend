<?php

namespace App\Http\Controllers;

use File;
use DataTables;
use App\Sekolah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\SekolahExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\SekolahRequest;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $sekolah = Sekolah::all();

        $dataTables = DataTables($sekolah)
            ->addColumn('action', function($sekolah){
                return '
                    <center>
                        <a
                            href="/dasbor/kaur-ekbang/keterangan-usaha/form-ubah/'.$sekolah->id.'"
                            class="btn btn-sm btn-social btn-warning"
                        >
                            <i class="fa fa-pencil"></i> Ubah
                        </a>
                        <a
                            href="/dasbor/kaur-ekbang/keterangan-usaha/surat/'.$sekolah->id.'"
                            class="btn btn-sm btn-social btn-success"
                            target="_blank"
                        >
                            <i class="fa fa-file-pdf-o"></i> Cetak
                        </a>
                    </center>
                ';
            })
            ->rawColumns(['action'])
            ->toJson();

        return $dataTables;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = Sekolah::count();

        return view('sekolah', compact(
            'total'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form_unggah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SekolahRequest $sekolahReq)
    {
        $tempFileSekolah = $sekolahReq->file('file_sekolah');
        $fileSekolah = File::get($tempFileSekolah);
        $date = Carbon::now();

        foreach (explode("\n", $fileSekolah) as $key=>$line){
            $array[$key] = explode('\\', $line);
        }

        foreach($array as $item){
            $dataSekolah[] = [
                'npsn' => substr($item[5], 0, 8),
                'nama_sekolah' => substr($item[5], 9),
                'alamat' => $item[3].' - '.$item[4]
            ];
        }

        $createSekolah = Sekolah::insert($dataSekolah);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function exportExcel()
    {
        return Excel::download(new SekolahExport, 'sekolah.xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
