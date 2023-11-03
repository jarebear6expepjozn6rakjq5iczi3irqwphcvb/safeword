<?php

namespace safeword;

class Species
{
    public static function pool(
        bool $default_common_name = false,
        bool $require_synonym = false,
        array $include_kingdoms = ["eukaryota", "bacteria", "viruses"]): array
    {
        return array_map(
            function ($i): array
            {
                return match ($i) {
                    "bacteria" => (array)json_decode(file_get_contents(
                        __DIR__ . "/raw_data/species/bacteria.json"
                    ), true)["bacteria"],
                    "eukaryota" => (array)json_decode(file_get_contents(
                        __DIR__ . "/raw_data/species/eukaryota.json"
                    ), true)["eukaryota"],
                    "viruses" => (array)json_decode(file_get_contents(
                        __DIR__ . "/raw_data/species/viruses.json"
                    ), true)["viruses"],
                    default => (array)["no data available"],
                };
            }, $include_kingdoms);
    }
}