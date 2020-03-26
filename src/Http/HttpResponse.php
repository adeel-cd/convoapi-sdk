<?php

namespace Poc\Http;

/**
 * Class HttpResponse
 * @package Poc\Http
 */
class HttpResponse
{

    /**
     * Set Response body for coming Request
     *
     * @param array $data
     * @param string|null $format
     * @return string|null
     */
    public function response(array $data, string $format = null)
    {

        $response = null;

        // Choose Format and assign to response @var
        switch ($format)
        {
            case 'xml':

                break;

            // Set default Response to JSON
            default:
                $response = $this->_json($response);
                break;
        }

        return $response;
    }

    /**
     * Set Data to JSON
     *
     * @param array $data
     * @return string
     */
    private function _json(array $data)
    {
        return \GuzzleHttp\json_encode($data);
    }
}