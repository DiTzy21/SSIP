<?php

namespace App\Http\Controllers\account;

use App\Models\CategoriesDebit;
use App\Models\Debit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DebitController extends Controller
{
    /**
     * DebitController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $debit = DB::table('debit')
            ->select('debit.id', 'debit.category_id', 'debit.user_id', 'debit.nominal', 'debit.debit_date', 'debit.description', 'categories_debit.id as id_category', 'categories_debit.name')
            ->join('categories_debit', 'debit.category_id', '=', 'categories_debit.id', 'LEFT')
            ->where('debit.user_id', Auth::user()->id)
            ->orderBy('debit.created_at', 'DESC')
            ->paginate(10);
        return view('account.debit.index', compact('debit'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $search = $request->get('q');
        $debit = DB::table('debit')
            ->select('debit.id', 'debit.category_id', 'debit.user_id', 'debit.nominal', 'debit.debit_date', 'debit.description', 'categories_debit.id as id_category', 'categories_debit.name')
            ->join('categories_debit', 'debit.category_id', '=', 'categories_debit.id', 'LEFT')
            ->where('debit.user_id', Auth::user()->id)
            ->where('debit.description', 'LIKE', '%' . $search . '%')
            ->orderBy('debit.created_at', 'DESC')
            ->paginate(10);
        return view('account.debit.index', compact('debit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoriesDebit::where('user_id', Auth::user()->id)
            ->get();
        return view('account.debit.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //set validasi required
        $this->validate(
            $request,
            [
                'nominal'       => 'required',
                'debit_date'    => 'required',
                'category_id'   => 'required',
                'description'   => 'required'
            ],
            //set message validation
            [
                'nominal.required' => 'Please input income',
                'debit_date.required' => 'please choose date',
                'category_id.required' => 'Please Choose Date!',
                'description.required' => 'Add Description!',
            ]
        );

        //Eloquent simpan data
        $save = Debit::create([
            'user_id'       => Auth::user()->id,
            'debit_date'   => $request->input('debit_date'),
            'category_id'   => $request->input('category_id'),
            'nominal'       => str_replace(",", "", $request->input('nominal')),
            'description'   => $request->input('description'),
        ]);
        //cek apakah data berhasil disimpan
        if ($save) {
            //redirect dengan pesan sukses
            return redirect()->route('account.debit.index')->with(['success' => 'Data Successfully Stored!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('account.debit.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Debit $debit)
    {
        $categories = CategoriesDebit::where('user_id', Auth::user()->id)
            ->get();
        return  view('account.debit.edit', compact('debit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Debit $debit)
    {
        //set validasi required
        $this->validate(
            $request,
            [
                'nominal'       => 'required',
                'debit_date'    => 'required',
                'category_id'   => 'required',
                'description'   => 'required'
            ],
            //set message validation
            [
                'nominal.required' => 'Masukkan Nominal Debit / Uang Masuk!',
                'debit_date.required' => 'Silahkan Pilih Tanggal!',
                'category_id.required' => 'Silahkan Pilih Kategori!',
                'description.required' => 'Masukkan Keterangan!',
            ]
        );

        //Eloquent simpan data
        $update = Debit::whereId($debit->id)->update([
            'user_id'       => Auth::user()->id,
            'category_id'   => $request->input('category_id'),
            'debit_date'    => $request->input('debit_date'),
            'nominal'       => str_replace(",", "", $request->input('nominal')),
            'description'   => $request->input('description'),
        ]);
        //cek apakah data berhasil disimpan
        if ($update) {
            //redirect dengan pesan sukses
            return redirect()->route('account.debit.index')->with(['success' => 'Data Successfully Updated!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('account.debit.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Debit::find($id);
        if ($data) {
            $data->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }
}
