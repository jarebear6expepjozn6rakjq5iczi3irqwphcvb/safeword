<?php

namespace safeword;

class Species
{
    public array $species_pool = ["this"];

    function __construct(
        bool $require_common_name = false,
        bool $require_synonym = false,
        array $included_kingdoms = ["eukaryota", "bacteria", "viruses"])
    {
        // build array of requested data
        array_map(
            function ($i): array
            {
                switch ($i) {
                    case "bacteria":
                        $this->species_pool = array_merge($this->species_pool, json_decode(file_get_contents(
                            __DIR__ . "/raw_data/species/bacteria.json"
                        ), true)["bacteria"]);
                        break;
                    case "eukaryota":
                        $this->species_pool = array_merge($this->species_pool, json_decode(file_get_contents(
                            __DIR__ . "/raw_data/species/eukaryota.json"
                        ), true)["eukaryota"]);
                        break;
                    case "viruses":
                        $this->species_pool = array_merge($this->species_pool, json_decode(file_get_contents(
                            __DIR__ . "/raw_data/species/viruses.json"
                        ), true)["viruses"]);
                        break;
                }
                print_r($this->species_pool);
                return ["no data available"];
            }, $included_kingdoms
        );

        if ($require_common_name)
        {
            $this->species_pool = array_filter(
                $this->species_pool,
            function ($i): bool
            {
                if($i["common_name"])
            }

            )
        }
    }
}

$a = new Species();