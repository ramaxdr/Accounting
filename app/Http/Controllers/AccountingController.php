<?php

namespace App\Http\Controllers;

use App\Models\modul;
use App\Models\modulform;
use App\Models\credit;
use App\Models\supplier;
use App\Models\format;

use Illuminate\Http\Request;

class AccountingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function storeGroup(Request $request)
    {
        $groupModul = new modul();
        $groupModul->id_group_modul = $request->input('id_group_modul');
        $groupModul->group_modul_name = $request->input('group_modul_name');
        $groupModul->group_modul_desc = $request->input('group_modul_desc');

        $groupModul->save();

        return redirect('/group-modul');
    }

    // group modul
    public function show()
    {
        $groupModul = modul::all();

        return view('dashboard/groupModul')->with('groupModul', $groupModul);
    }

    public function createGroupModul()
    {
        $groupModulCode = modul::all();

        return view('dashboard/modulAdd', compact('groupModulCode'));
    }

    function editGroup($id)
    {
        $groupModulEdit = modul::find($id);

        return view('dashboard/groupModulEdit', compact('groupModulEdit'));
    }


    public function updateGroup(Request $request, $id)
    {
        $groupModulUpdate = modul::find($id);

        $groupModulUpdate->id_group_modul = $request->input('id_group_modul');
        $groupModulUpdate->group_modul_name = $request->input('group_modul_name');
        $groupModulUpdate->group_modul_desc = $request->input('group_modul_desc');

        $groupModulUpdate->update();

        return redirect('/group-modul');
    }


    public function destroyGroup(string $id)
    {
        // Cari data group modul berdasarkan ID
        $groupModulDestroy = modul::find($id);

        // Periksa apakah data ditemukan
        if (!$groupModulDestroy) {
            // Jika tidak ditemukan, redirect kembali ke halaman sebelumnya
            return redirect()->back()->with('error', 'Data not found.');
        }

        // Hapus data dari database
        $groupModulDestroy->delete();

        // Redirect kembali ke halaman yang sesuai setelah penghapusan berhasil
        return redirect('/group-modul')->with('success', 'Data deleted successfully.');
    }

    // modul form

    public function showModul()
    {
        $modulForm = modulform::all();

        return view('dashboard/modulForm', compact('modulForm'));
    }

    public function storeModul(Request $request)
    {
        $modulForm = new modulform();
        $modulForm->id_modul = $request->input('id_modul');
        $modulForm->id_group_modul = $request->input('id_group_modul');
        $modulForm->group_modul_name = $request->input('group_modul_name');
        $modulForm->modul_name = $request->input('modul_name');
        $modulForm->modul_desc = $request->input('modul_desc');
        $modulForm->modul_status = $request->input('modul_status');


        $modulForm->save();

        return redirect('/modul-form');
    }

    public function joinGroup()
    {
        $modulForm = modul::all();

        return view('dashboard.modulAdd', compact('modulForm'));
    }

    public function editModul($id)
    {

        $modulForm = modul::all();
        $modulEdit = modulform::find($id);

        return view('dashboard/modulEdit', compact('modulEdit'), compact('modulForm'));
    }

    public function updateModul(Request $request, $id)
    {
        $modulUpdate = modulform::find($id);

        $modulUpdate->id_modul = $request->input('id_modul');
        $modulUpdate->id_group_modul = $request->input('id_group_modul');
        $modulUpdate->group_modul_name = $request->input('group_modul_name');
        $modulUpdate->modul_name = $request->input('modul_name');
        $modulUpdate->modul_desc = $request->input('modul_desc');
        $modulUpdate->modul_status = $request->input('modul_status');

        $modulUpdate->update();

        return redirect('/modul-form');
    }

    public function destroyModul(string $id)
    {
        // Cari data group modul berdasarkan ID
        $modulDestroy = modulform::find($id);

        // Periksa apakah data ditemukan
        if (!$modulDestroy) {
            // Jika tidak ditemukan, redirect kembali ke halaman sebelumnya
            return redirect()->back()->with('error', 'Data not found.');
        }

        // Hapus data dari database
        $modulDestroy->delete();

        // Redirect kembali ke halaman yang sesuai setelah penghapusan berhasil
        return redirect('/modul-form')->with('success', 'Data deleted successfully.');
    }


    // credit term
    public function showCredit()
    {
        $credit = credit::all();

        return view('dashboard/credit', compact('credit'));
    }

    public function storeCredit(Request $request)
{
    // Ambil nilai dari form
    $credit_term_name = $request->input('credit_term_name');
    $credit_term_value = $request->input('credit_term_value');
    $credit_term_status = $request->input('credit_term_status');
    $id_modul = $request->input('id_modul');

    // Ambil format dari tabel document_format berdasarkan id_modul yang dipilih
    $format = format::where('id_modul', $id_modul)->first();

    // Buat entri baru di tabel credit
    $credit = new Credit();

    // Jika format ditemukan, gunakan format dari document_format untuk "Credit Term Code"
    if ($format) {
        $credit_term_code = $format->format;
    } else {
        // Jika tidak ada format, tetapkan nilai default sesuai kebutuhan Anda
        $credit_term_code = 'Default Code';
    }

    // Isi nilai-nilai dari form
    $credit->credit_term_code = $credit_term_code;
    $credit->credit_term_name = $credit_term_name;
    $credit->credit_term_value = $credit_term_value;
    $credit->credit_term_status = $credit_term_status;
    $credit->id_modul = $id_modul;

    // Simpan data ke tabel credit
    $credit->save();

    return redirect('/credit-term');
}



public function joinModul()
{
    $credit = modulform::all();
    $format = format::all();

    return view('dashboard.creditAdd', compact('credit', 'format'));
}


    public function creditEdit($id)
    {

        $modulform = modulform::all();
        $credit = credit::find($id);

        return view('dashboard/creditEdit', compact('credit'), compact('modulform'));
    }

    public function creditUpdate(Request $request, $id)
    {
        $credit = credit::find($id);

        $credit->credit_term_code = $request->input('credit_term_code');
        $credit->credit_term_name = $request->input('credit_term_name');
        $credit->credit_term_value = $request->input('credit_term_value');
        $credit->credit_term_status = $request->input('credit_term_status');
        $credit->id_modul = $request->input('id_modul');
        $credit->update();

        return redirect('/credit-term');
    }

    public function creditDestroy(string $id)
    {
        $credit = credit::find($id);

        if (!$credit) {
            return redirect()->back()->with('error', 'Data not found.');
        }

        $credit->delete();

        return redirect('/credit-term')->with('success', 'Data deleted successfully.');
    }


    // document format
    public function formatShow()
    {
        $format = format::all();

        return view('dashboard/dnf', compact('format'));
    }

    public function formatStore(Request $request)
    {
        $format = new Format();

        $format->doc_num_code = $request->input('doc_num_code');
        $format->doc_num_name = $request->input('doc_num_name');
        $format->id_modul = $request->input('id_modul');
        $format->start_number = $request->input('start_number');
        $format->format = $request->input('format');

        // Ambil modul_name dari tabel modulform berdasarkan id_modul yang dipilih
        // $modul = modulform::find($format->id_modul);
        // if ($modul) {
        //     $format->modul_name = $modul->modul_name;
        // }

        $format->save();

        return redirect('/document-numbering-format');
    }


    public function formatJoin()
    {
        $format = modulform::all();

        return view('dashboard/dnfAdd', compact('format'));
    }

    public function formatEdit($id)
    {

        $modulform = modulform::all();
        $format = format::find($id);

        return view('dashboard/dnfEdit', compact('format'), compact('modulform'));
    }

    public function formatUpdate(Request $request, $id)
    {
        $format = format::find($id);

        $format->doc_num_code = $request->input('doc_num_code');
        $format->doc_num_name = $request->input('doc_num_name');
        $format->id_modul = $request->input('id_modul');
        $format->start_number = $request->input('start_number');
        $format->format = $request->input('format');
        $format->update();

        return redirect('/document-numbering-format');
    }


    public function formatDestroy(string $id)
    {
        $format = format::find($id);

        if (!$format) {
            return redirect()->back()->with('error', 'Data not found.');
        }

        $format->delete();

        return redirect('/document-numbering-format')->with('success', 'Data deleted successfully.');
    }
}
