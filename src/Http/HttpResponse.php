<?php

namespace Poc\Http;

use Psr\Http\Message\ResponseInterface;

/**
 * Class HttpResponse
 * @package Poc\Http
 */
class HttpResponse implements HttpResponseInterface
{

    /**
     * @var
     */
    private $response;

    /**
     * HttpResponse constructor.
     * @param $response
     */
    public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * Get Response Type
     *
     * @param string|null $format
     * @return mixed|string|null
     */
    public function getResponse(string $format = null)
    {

        $response = null;

        // Choose Format and assign to response
        switch ($format)
        {
            // Set Response to XML
            case self::XML:
                $response = $this->_xml($this->_setResponse());
                break;

            // Set Response to JSON
            case self::JSON:
                $response = $this->_json($this->_setResponse());
                break;

            // Default Response to JSON
            default:
                $response = $this->_json($this->_setResponse());
                break;
        }

        return $response;
    }

    /**
     * Provide Response
     *
     * @return array
     */
    private function _setResponse()
    {
        return [
            'status'  => $this->response->getStatusCode(),
            'message' => $this->_setMessage(),
            'data'    => $this->_setData(),
        ];
    }

    /**
     * Set Response Data
     *
     * @return mixed
     */
    private function _setData()
    {
        $body = $this->_decode($this->response->getBody());

        // Remove extra keys from response body
        if(isset($body->responseStatus))
        {
            unset($body->responseStatus);
        }

        return $body;
    }

    /**
     * Set Response Message
     *
     * @return mixed
     */
    private function _setMessage()
    {
        $body = $this->_decode($this->response->getBody());
        return isset($body->responseStatus) && isset($body->responseStatus->message)
            ? $body->responseStatus->message : null;
    }

    /**
     * Set DataType to JSON
     *
     * @param array $data
     * @return string
     */
    private function _json(array $data)
    {
        return \GuzzleHttp\json_encode($data);
    }

    /**
     * Set DataType To Array
     *
     * @param string $data
     * @return mixed
     */
    private function _decode(string $data)
    {
        return \GuzzleHttp\json_decode($data);
    }

    /**
     * @param array $data
     */
    private function _xml(array $data)
    {

    }
}