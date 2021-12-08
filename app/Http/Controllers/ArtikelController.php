<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Slider;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
	public function create()
	{
		return view('artikel');
	}

	// public function show(Artikel $artikel)
    // {
    //     return view('detail-artikel', [
    //         'artikel' => $artikel,
    //     ]);
    // }

	public function show(Artikel $artikel)
    {
		
        return view('detail-artikel', [
            'artikel' => $artikel,
        ]);
		
    }

	public function view(Artikel $id)
    {
		$sliders = Slider::all();
        $artikels = Artikel::all();
        return view('artikel', compact('artikels', 'sliders'));
    }


    public function upload(){
		$gambar = Artikel::orderBy('created_at', 'desc')->paginate(1);
		return view('admin.create-artikel',['gambar' => $gambar]);

	}

	public function proses_upload(Request $request){
		$this->validate($request, [
			'judul' => 'required',
			'keterangan' => 'required',
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		]);

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');

		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'images';
		$file->move($tujuan_upload,$nama_file);

		Artikel::create([
			'judul' => $request->judul,
			'keterangan' => $request->keterangan,
			'file' => $nama_file,
		]);

		return redirect('dashboard')->with('statusArtikel', 'Data Berhasil Dibuat');
	}

	public function edit($id)
	{
		$artikel = Artikel::findorfail($id);
		return view('admin.edit-artikel', compact('artikel'));
	}

	public function update(Request $request, $id)
	{
		$artikel = Artikel::findorfail($id);
		$artikel->update($request->all());
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');

		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'images';
		$file->move($tujuan_upload,$nama_file);

		Artikel::where('id', $id)->update([
			'judul' => $request->judul,
			'keterangan' => $request->keterangan,
			'file' => $nama_file,
		]);



		return redirect('dashboard')->with('statusGroup', 'Data Berhasil Dirubah');
	}

	public function destroy($id)
    {
        Artikel::destroy($id);
        return redirect('dashboard')->with('statusGroup', 'Data Berhasil Dihapus');
    }
}
