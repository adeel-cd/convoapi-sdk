<?php

namespace Poc\Http;

use Exception;
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
     * HttpResponse
     *
     * @var ResponseInterface
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
     * Provide Http Body Response
     *
     * @param string|null $format           data return format
     * @param bool        $message_decoding decode or not
     *
     * @return array|mixed|string|null
     */
    public function getResponse(string $format = null, bool $message_decoding = false)
    {

        $response = null;

        // Choose Format and assign to _response
        switch ($format)
        {
            // Set Response to XML
        case self::XML:
            $response = $this->_xml($this->_setResponse($message_decoding));
            break;

            // Set Response to JSON
        case self::JSON:
            $response = $this->_json($this->_setResponse($message_decoding));
            break;

            // Default Response to JSON
        default:
            $response = $this->_json($this->_setResponse($message_decoding));
            break;
        }

        return $response;
    }

    /**
     * Set Body Response
     *
     * @param $decoding, for decoded message
     * @return array
     */
    private function _setResponse($decoding)
    {

        // if request fails
        if( $this->_response instanceof Exception )
        {
            return $this->_failResponse($decoding);
        }

        return $this->_successResponse($decoding);
    }

    /**
     * Set Success Response
     *
     * @param $decoding, for decoded message
     * @return array
     */
    private function _successResponse($decoding)
    {
        $message = $this->_setMessage();

        return [
            'status'  => $this->_response->getStatusCode(),
            'message' => $decoding ? $this->_decode($message) : $message,
            'data'    => $this->_setData(),
        ];
    }

    /**
     * Set Failed Response
     *
     * @param $decoding, for decoded message
     * @return array
     */
    private function _failResponse($decoding)
    {
        $message = $this->_response->getMessage();

        return [
            'status'  => $this->_response->getCode(),
            'message' => $decoding ? $this->_decode($message) : $message
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