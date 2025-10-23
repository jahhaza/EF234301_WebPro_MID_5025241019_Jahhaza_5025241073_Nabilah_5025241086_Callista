<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function index()
    {
        $upcomingConcerts = Concert::where('date', '>=', now())
            ->where('status', 'upcoming')
            ->orderBy('date', 'asc')
            ->get();

        $pastConcerts = Concert::where('date', '<', now())
            ->orWhere('status', 'completed')
            ->orderBy('date', 'desc')
            ->get();

        $cartCount = $this->getCartCount();

        return view('concerts.index', compact('upcomingConcerts', 'pastConcerts', 'cartCount'));
    }

    public function show(Concert $concert)
    {
        $relatedConcerts = Concert::where('id', '!=', $concert->id)
            ->where('status', 'upcoming')
            ->orderBy('date', 'asc')
            ->take(3)
            ->get();

        $cartCount = $this->getCartCount();

        return view('concerts.show', compact('concert', 'relatedConcerts', 'cartCount'));
    }

    public function create()
    {
        return view('admin.concerts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'date' => 'required|date',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'ticket_url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'status' => 'required|in:upcoming,ongoing,completed,cancelled'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('concerts', 'public');
        }

        Concert::create([
            'title' => $request->title,
            'venue' => $request->venue,
            'date' => $request->date,
            'city' => $request->city,
            'country' => $request->country,
            'ticket_url' => $request->ticket_url,
            'image' => $imagePath,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('admin.concerts.index')
            ->with('success', 'Concert created successfully!');
    }

    public function edit(Concert $concert)
    {
        return view('admin.concerts.edit', compact('concert'));
    }

    public function update(Request $request, Concert $concert)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'date' => 'required|date',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'ticket_url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'status' => 'required|in:upcoming,ongoing,completed,cancelled'
        ]);

        $data = [
            'title' => $request->title,
            'venue' => $request->venue,
            'date' => $request->date,
            'city' => $request->city,
            'country' => $request->country,
            'ticket_url' => $request->ticket_url,
            'description' => $request->description,
            'status' => $request->status
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($concert->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($concert->image);
            }
            
            $data['image'] = $request->file('image')->store('concerts', 'public');
        }

        $concert->update($data);

        return redirect()->route('admin.concerts.index')
            ->with('success', 'Concert updated successfully!');
    }

    public function destroy(Concert $concert)
    {
        if ($concert->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($concert->image);
        }

        $concert->delete();

        return redirect()->route('admin.concerts.index')
            ->with('success', 'Concert deleted successfully!');
    }

    public function adminIndex()
    {
        $concerts = Concert::orderBy('date', 'desc')->get();
        return view('admin.concerts.index', compact('concerts'));
    }

    private function getCartCount()
    {
        $cart = session()->get('cart', []);
        return array_sum(array_column($cart, 'quantity'));
    }
}