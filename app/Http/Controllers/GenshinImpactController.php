<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenshinImpactController extends Controller
{

    private function characters(): array
    {
        $path = storage_path('app/characters.json');

        return json_decode(file_get_contents($path), true);
    }

    private function saveCharacters(array $characters): void
    {
        $path = storage_path('app/characters.json');

        file_put_contents(
            $path,
            json_encode($characters, JSON_PRETTY_PRINT)
        );
    }

    public function index(Request $request)
    {
        $characters = $this->characters();

        $element = $request->query('element', 'all');
        $rarity = $request->query('rarity', 'all');

        if ($element !== 'all' && $element !== '') {
            $characters = array_filter(
                $characters,
                fn (array $character): bool =>
                    strcasecmp($character['element'], $element) === 0
            );
        }

        if ($rarity !== 'all' && $rarity !== '') {
            $characters = array_filter(
                $characters,
                fn (array $character): bool =>
                    (string) $character['rarity'] === (string) $rarity
            );
        }

        return view('characters.index', [
            'characters' => $characters,
            'element' => $element,
            'rarity' => $rarity,
        ]);
    }

    public function create()
    {
        return view('characters.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'element' => 'required|in:Anemo,Cryo,Electro,Pyro,Dendro,Hydro',
            'weapon' => 'required|in:Sword,Claymore,Polearm,Catalyst,Bow',
            'rarity' => 'required|numeric|in:4,5',
        ]);

        $characters = $this->characters();

        $nextId = max(array_keys($characters)) + 1;

        $characters[$nextId] = [
            'id' => $nextId,
            'name' => $validated['name'],
            'element' => $validated['element'],
            'weapon' => $validated['weapon'],
            'rarity' => (int) $validated['rarity'],
        ];

        $this->saveCharacters($characters);

        return redirect()
            ->route('characters.index')
            ->with('success', 'Character added successfully.');
    }

    public function show(int $id)
    {
        $characters = $this->characters();

        if (!isset($characters[$id])) {
            abort(404);
        }

        return view('characters.show', [
            'character' => $characters[$id],
        ]);
    }

    public function edit(int $id)
    {
        // Not implemented yet.
    }

    public function update(Request $request, int $id)
    {
        // Not implemented yet.
    }

    public function destroy(int $id)
    {
        // Not implemented yet.
    }

    public function featured()
    {
        $characters = $this->characters();

        return view('characters.featured', [
            'character' => $characters[4],
        ]);
    }

}