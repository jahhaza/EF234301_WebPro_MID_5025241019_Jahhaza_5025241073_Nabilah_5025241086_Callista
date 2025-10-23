<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::all();
        $popularSongs = Song::orderBy('stream_count', 'desc')->take(5)->get();
        $albums = Song::select('album')->distinct()->get();
        $cartCount = $this->getCartCount();

        return view('songs.index', compact('songs', 'popularSongs', 'albums', 'cartCount'));
    }

    public function show(Song $song)
    {
        $song->incrementStreamCount();
        
        $relatedSongs = Song::where('album', $song->album)
            ->where('id', '!=', $song->id)
            ->get();

        $cartCount = $this->getCartCount();

        return view('songs.show', compact('song', 'relatedSongs', 'cartCount'));
    }

    public function play(Song $song)
    {
        $song->incrementStreamCount();

        return response()->json([
            'success' => true,
            'song' => [
                'id' => $song->id,
                'title' => $song->title,
                'album' => $song->album,
                'duration' => $song->duration,
                'file_url' => $song->audio_url,
                'cover_url' => $song->cover_url
            ]
        ]);
    }

    public function album($albumName)
    {
        $songs = Song::where('album', $albumName)->get();
        
        if ($songs->isEmpty()) {
            abort(404, 'Album not found');
        }

        $cartCount = $this->getCartCount();

        return view('songs.album', compact('songs', 'albumName', 'cartCount'));
    }

    public function recentlyPlayed()
    {
        $user = auth()->user();
        $recentlyPlayed = $user->recentlyPlayed()
            ->with('song')
            ->orderBy('played_at', 'desc')
            ->take(10)
            ->get()
            ->pluck('song');

        return response()->json([
            'songs' => $recentlyPlayed
        ]);
    }

    public function addToRecentlyPlayed(Request $request, Song $song)
    {
        $user = auth()->user();
        
        // Remove if already exists to avoid duplicates
        $user->recentlyPlayed()->where('song_id', $song->id)->delete();
        
        // Add new entry
        $user->recentlyPlayed()->create([
            'song_id' => $song->id,
            'played_at' => now()
        ]);

        return response()->json(['success' => true]);
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        
        $songs = Song::where('title', 'LIKE', "%{$query}%")
            ->orWhere('album', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();

        return response()->json([
            'songs' => $songs
        ]);
    }

    private function getCartCount()
    {
        $cart = session()->get('cart', []);
        return array_sum(array_column($cart, 'quantity'));
    }
}