<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenshinImpactController extends Controller
{

    private function characters(): array
    {
        return [
            1 => ['id' => 1, 'name' => 'Traveler', 'element' => 'Anemo', 'weapon' => 'Sword', 'rarity' => 5,],
            2 => ['id' => 2, 'name' => 'Odette', 'element' => 'Cryo', 'weapon' => 'Sword', 'rarity' => 5,],
            3 => ['id' => 3, 'name' => 'Sandrone', 'element' => 'Cryo', 'weapon' => 'Claymore', 'rarity' => 5,],
            4 => ['id' => 4, 'name' => 'Raiden Shogun', 'element' => 'Electro', 'weapon' => 'Polearm', 'rarity' => 5,],
            5 => ['id' => 5, 'name' => 'Ineffa', 'element' => 'Electro', 'weapon' => 'Polearm', 'rarity' => 5,],
            6 => ['id' => 6, 'name' => 'Bennett', 'element' => 'Pyro', 'weapon' => 'Sword', 'rarity' => 4,],
        ];
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
        // Not implemented yet.
    }

    public function store(Request $request)
    {
        // Not implemented yet.
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