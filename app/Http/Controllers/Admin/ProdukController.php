<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Tag;
use App\Models\Admin\Image;
use Illuminate\Support\Str;
use App\Models\Admin\Produk;
use Illuminate\Http\Request;
use App\Models\Admin\Kategori;
use App\Models\Admin\ProdukTag;
use App\Http\Controllers\Controller;
use Cviebrock\EloquentSluggable\Tests\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $produk = Produk::with('kategori','tag')->latest()->get();
        // return view('admin.produk.index',['active' => 'produk'], compact('produk'));

        return view('admin.produk.index',['active' => 'produk'])->with([
            'produk' => Produk::with(['kategori','tags'])->latest()->paginate(10),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        // $tag = Tag::all();
        // return view('admin.produk.create',['active' => 'produk'], compact('kategoris','tag'));

        return view('admin.produk.create',compact('kategoris'),['active' => 'produk'])->with([
            'tags' => Tag::all(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required',
            'tags' => 'required',
            'name' => 'required',
            'hpp' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
        ]);

        $produk = new Produk();
        $produk->kategori_id = $request->kategori_id;
        $produk->name = $request->name;
        $produk->hpp = $request->hpp;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->diskon = $request->diskon;
        $produk->deskripsi = $request->deskripsi;
        $produk->slug = Str::slug($request->name, '-');
        $produk->save();

        // dd($produk->slug);
        // foreach ($produk as $pro){
        //     ProdukTag::create([
        //         'produk_id' => $produk->id,
        //         'tags' => $request->tags
        //     ]);
        // }

        if($request->has('tags'))
        {
            $produk->tags()->attach($request->tags);
        }

        if ($request->hasfile('gambar_produk')) {
            foreach ($request->file('gambar_produk') as $image) {
                $name = rand(1000, 9999) . $image->getClientOriginalName();
                $image->move('images/gambar_produk/', $name);
                $images = new Image();
                $images->produk_id = $produk->id;
                $images->gambar_produk = 'images/gambar_produk/' . $name;
                $images->save();
            }
        }

        return redirect()
            ->route('produk.index')->with('toast_success', 'Data Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        
        // return view('admin.produk.show',['active' => 'produk'],compact('images'))->with([
            //     'produk' => Produk::findOrFail($id)->with(['kategori','tags']),
            // ]);
            
        $produk = Produk::findBySlug($slug);
        $kategoris = Kategori::all();
        $tags = ProdukTag::where('produk_id', $produk->id)->get();
        $images = Image::where('produk_id', $produk->id)->get();
        return view('admin.produk.show',['active' => 'produk'], compact('kategoris', 'produk', 'tags', 'images'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $produk = Produk::findBySlug($slug);
        $kategoris = Kategori::all();
        $tags = Tag::latest()->get(['id', 'name']);
        $images = Image::where('produk_id', $produk->id)->get();
        // dd($images);
        return view('admin.produk.edit',['active' => 'produk'], compact('kategoris', 'produk','tags', 'images'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori_id' => 'required',
            'tags' => 'required',
            'name' => 'required',
            'hpp' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            // 'deskripsi' => 'required',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->kategori_id = $produk->kategori_id;
        // $produk->tags = $request->tags;
        $produk->name = $request->name;
        $produk->slug = Str::slug($request->name, '-');
        $produk->hpp = $request->hpp;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->diskon = $request->diskon;
        $produk->deskripsi = $request->deskripsi;
        $produk->save();

        $tags = ProdukTag::where('produk_id',$produk->id)->delete();
        foreach ($request->tags as $tag){
            $tags = new ProdukTag();
            $tags->produk_id = $produk->id;
            $tags->tag_id = $tag;
            $tags->save();

        }

        // if($request->has('tags'))
        // {
        //     $produk->tags()->attach($request->tags);
        // }
        
        return redirect()
            ->route('produk.index')->with('toast_success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produks = Produk::findOrFail($id);
        $images = Image::where('produk_id', $id)->get();
        foreach ($images as $image) {
            $image->deleteImage();
            $image->delete();
        }
        $produks->delete();
        return redirect()
            ->route('produk.index')->with('toast_success', 'Data Berhasil Dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Produk::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
