<?php

namespace App\Http\Controllers\Backsite\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Publication\UpdatePublicationRequest;
use App\Models\Publication;
use File;
use Illuminate\Http\Request;
use Storage;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Publication::orderBy('title')->get();
        return view('pages.backsite.admin.publication.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $price = str_replace(['Rp ', '.', ' '], '', $request->input('price'));
        $price = floatval($price);

        // upload process here
        $path = 'assets/images/publication/cover-image';
        if (!File::isDirectory($path)) {
            Storage::disk('public')->makeDirectory($path);
        }

        // change file locations
        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image');
            $coverImageName = time() . '.' . $coverImage->getClientOriginalExtension();
            $coverImagePath = $path . '/' . $coverImageName;

            // Simpan gambar ke penyimpanan
            Storage::disk('public')->put($coverImagePath, file_get_contents($coverImage));

            $data['cover_image'] = $coverImagePath;
        } else {
            $data['cover_image'] = null;
        }

        $publication = Publication::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'price' => $price,
            'stock' => $request->input('stock'),
            'weight' => $request->input('weight'),
            'cover_image' => $data['cover_image'],
        ]);

        // dd($data);

        alert()->success('Success Message', 'Successfully added new publication');
        return redirect()->route('admin.publication.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $publication = Publication::find($id);
        return view('pages.backsite.admin.publication.edit', compact('publication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublicationRequest $request, string $id)
    {
        $publication = Publication::find($id);
        $data = $request->all();

        $price = str_replace(['Rp ', '.', ' '], '', $request->input('price'));
        $price = floatval($price);

        if ($request->hasFile('cover_image')) {
            // Get the old cover image path
            $old_cover_image_path = $publication->cover_image;

            // Upload the new cover image
            $new_cover_image_path = Storage::disk('public')->putFile(
                'assets/images/publication/cover-image',
                $request->file('cover_image')
            );

            // Update the cover_image field in the database with the new path
            $data['cover_image'] = $new_cover_image_path;

            // Delete the old cover image from storage if it exists
            if (Storage::disk('public')->exists($old_cover_image_path)) {
                Storage::disk('public')->delete($old_cover_image_path);
            }
        } else {
            // If no new cover image is uploaded, retain the existing cover image
            $data['cover_image'] = $publication->cover_image;
        }

        $publication->update([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'price' => $price,
            'stock' => $request->input('stock'),
            'weight' => $request->input('weight'),
            'cover_image' => $data['cover_image'],
        ]);

        // dd($data);

        alert()->success('Success Message', 'Publication successfully updated');
        return redirect()->route('admin.publication.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
