<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->simplePaginate(5);
        return view('admin.slider', compact('sliders'));
    }

    public function viewSlider(Slider $id)
    {
        $sliders = Slider::all();
        return view('artikel', compact('sliders'));
    }

    public function createSlider()
    {
        $sliders = Slider::all();
        return view('admin.create-slider', compact('sliders'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'judul' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');

		$nama_file = time()."_".$file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'images';
		$file->move($tujuan_upload,$nama_file);

        Slider::create([
            'judul' => $request->judul,
            'file' => $nama_file,
        ]);

        Request::create($request);
        return redirect('slider')->with('statusSlider', 'Data Berhasil Dibuat');
    }

    public function edit ($id)
    {
        $slider = Slider::findorfail($id);
        return view('admin.edit-slider', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findorfail($id);
		$slider->update($request->all());
        // menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');

        if($request->hasFile('file')){
            $file = request()->file('file');
            $nama_file = time() . '.' . $file->getClientOriginalExtension();
            $tujuan_upload = public_path('/images/');
            $file->move($tujuan_upload, $nama_file);
            
            Slider::where('id', $id)->update([
                'judul' => $request->judul,
                'file' => $nama_file,
            ]);
        }
        
		return redirect('editSlider')->with('statusSlider', 'Data Berhasil Dirubah');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();

        return redirect('slider')->with('statusGroup', 'Data Berhasil Dirubah');
    }
}
