<?php

namespace safeword;

require __DIR__ . '/Species.php';

class SafeWord
{
    private array $adjective_pool = [];
    private array $verb_pool = [];
    private array $species_pool = [];

    // TODO change function inputs to [array] for easier config handling maybe
    function __construct(bool $build_adjectives = true, bool $build_verbs = true, bool $build_species = true)
    {
        // ingress raw []'s

        if ($build_adjectives) {
            $this->adjective_pool = ["sad", "discouraged", "melancholy"];
        }

        if ($build_verbs) {
            $this->verb_pool = ["fucked", "barfing", "sidestepping"];
        }

        if ($build_species) {
            $this->species_pool = Species::pool(false, false, ["eukaryota"]);
        }
    }

    function build_slug(array $combination = ["adjective", "verb", "species"]): array
    {
//        print_r($combination);
        return $this->species_pool;
    }

    function secure_rand_int(): int
    {

    }
}

//$a = new SafeWord(true, true, true);
//print_r($a->build_slug());