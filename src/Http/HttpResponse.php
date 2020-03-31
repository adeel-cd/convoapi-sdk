<?php

namespace Poc\Http;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

/**
 * This class provides Http Response Body.
 * Class HttpResponse
 *
 * @category Response
 * @package  Poc\Http
 * @author   Yousuf Khalid <yousuf.khalid@codedistrict.com>
 * @license  https://github.com/adeel-cd/convoapi-sdk/blob/master/LICENSE.md MIT
 * @link     https://packagist.org/packages/convo/alert
 */
class HttpResponse implements HttpResponseInterface
{

    const XML  = 'xml';
    const JSON = 'json';

    /**
     * Set Response Instance
     *
     * @var ResponseInterface|ClientException
     */
    private $_response;

    /**
     * HttpResponse constructor.
     *
     * @param $response object
     */
    public function __construct($response)
    {
        $this->_response = $response;
    }

    /**
     * Get Response Type
     *
     * @param string|null $format define response type
     *
     * @return mixed|string|null
     */
    public function getResponse(string $format = null)
    {

        $response = null;

        // Choose Format and assign to _response
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
     * Provide Response Body
     *
     * @return array
     */
    private function _setResponse()
    {


        if( $this->_response instanceof ClientException
            || $this->_response instanceof RequestException )
        {
            return $this->_failResponse();
        }

        return $this->_successResponse();
    }

    /**
     * Success Response
     *
     * @return array
     */
    private function _successResponse()
    {
        return [
            'status'  => $this->_response->getStatusCode(),
            'message' => $this->_setMessage(),
            'data'    => $this->_setData(),
        ];
    }

    /**
     * Failed Response
     *
     * @return array
     */
    private function _failResponse()
    {
        return [
            'status'  => $this->_response->getCode(),
            'message' => $this->_response->getMessage()
        ];
    }

    /**
     * Set Response Data
     *
     * @return mixed
     */
    private function _setData()
    {
        $body = $this->_decode($this->_response->getBody());

        // Remove extra keys from _response body
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
        $body = $this->_decode($this->_response->getBody());
        return isset($body->responseStatus) && isset($body->responseStatus->message)
            ? $body->responseStatus->message : null;
    }

    /**
     * Set DataType to JSON
     *
     * @param array $data must be array
     *
     * @return string
     */
    private function _json(array $data)
    {
        return \GuzzleHttp\json_encode($data);
    }

    /**
     * Set DataType To Array
     *
     * @param string $data must be array
     *
     * @return mixed
     */
    private function _decode(string $data)
    {
        return \GuzzleHttp\json_decode($data);
    }

    /**
     * Set DataType to XML
     *
     * @param array $data must be array
     *
     * @return array
     */
    private function _xml(array $data)
    {
        return $data;
    }
}