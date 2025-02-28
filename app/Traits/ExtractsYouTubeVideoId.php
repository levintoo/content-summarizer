<?php

namespace App\Traits;


trait ExtractsYouTubeVideoId
{
    public function extractVideoId($url): mixed
    {
        $queryString = parse_url($url, PHP_URL_QUERY);

        parse_str($queryString, $queryParams);

        if (!isset($queryParams['v']) || $queryParams['v'] == "") {
            return null;
        }

        return $queryParams['v'];
    }
}
