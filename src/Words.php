<?php

namespace safeword;

class Words
{
    public static function pool(
        array $include_word_types = ["verbs", "adjectives", "nouns"]): array
    {
        return array_reduce(
            array_map(
                function ($i): array
                {
                    return match ($i) {
                        "verbs" => (array)json_decode(
                            file_get_contents(
                                __DIR__ . "/raw_data/words/verbs.json"
                            ), true)["verbs"],
                        default => (array)["no data available"],
                    };
                }, $include_word_types),
            []
        );
    }
}