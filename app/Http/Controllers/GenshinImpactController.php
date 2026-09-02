<?php

namespace App\Http\Controllers;

class GenshinImpactController extends Controller
{


//keeps all activity data in one place.
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

    public function index()
    {
        return view('characters.index', [
            'characters' => $this->characters(),
        ]);
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

    public function featured()
    {
        $characters = $this->characters();

        return view('characters.featured', [
            'character' => $characters[4],
        ]);
    }

    public function filter(?string $element = null)
    {
        $characters = $this->characters();

        if ($element !== null && $element !== '') {
            $characters = array_filter(
                $characters,
                fn (array $character): bool => strcasecmp($character['element'], $element) === 0
            );
        }

        return view('characters.filter', [
            'characters' => $characters,
            'element' => $element,
        ]);
    }
}