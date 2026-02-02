<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Track;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function addAlbum(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'label' => 'required',
            'release_date' => 'required',
            'country' => 'required',
            'cover' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'format' => 'nullable',
            'notes' => 'nullable',
            'tracks' => 'required|array|min:1',
            'tracks.*.position' => 'required|integer',
            'tracks.*.artist' => 'required|string',
            'tracks.*.song_title' => 'required|string',
            'tracks.*.duration' => 'required|string',
        ]);

       

        if ($request->hasFile('cover')) {
            $incomingFids['cover'] = $request->file('cover')->store('images', 'public');
        }

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['author'] = strip_tags($incomingFields['author']);
        $incomingFields['genre'] = strip_tags($incomingFields['genre']);

        $album = Album::create($incomingFields);

        foreach ($incomingFields['tracks'] as $data) {
        if ($data['position'] !== null && $data['song_title'] !== null && $data['artist'] !== null && $data['duration'] !== null) {
            $album->tracks()->create([
                'position' => $data['position'],
                'artist' => $data['artist'],
                'song_title' => $data['song_title'],
                'duration' => $data['duration'],
            ]);
        }
            
        }
        return redirect('/');
    }

    public function filterGenre(Request $request)
    {
        
        if ($request->filled('genre')) {
            $albums = Album::where('genre', $request->genre)->get();
        } else {
            $albums = Album::all();
        }

        return view('main', compact('albums'));
    }


     
}
