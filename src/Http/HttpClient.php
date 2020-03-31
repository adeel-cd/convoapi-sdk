<?php

namespace Poc\Http;

use GuzzleHttp\Client;
use Poc\Exception\ConvoHttpException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;

/**
 * This class provides Http Client Requests.
 * Class HttpClient
 *
 * @category HttpClient
 * @package  Poc\Http
 * @author   Yousuf Khalid <yousuf.khalid@codedistrict.com>
 * @license  https://github.com/adeel-cd/convoapi-sdk/blob/master/LICENSE.md MIT
 * @link     https://packagist.org/packages/convo/alert
 */
class HttpClient implements HttpClientInterface
{

    const GET    = 'get';
    const PUT    = 'put';
    const POST   = 'post';
    const PATCH  = 'patch';
    const DELETE = 'delete';
    const AUTHORIZATION = 'Bearer ';
    const CONTENT_TYPE  = 'application/json';

    /**
     * @var Client
     */
    private $_client;

    /**
     * HttpClient constructor.
     */
    public function __construct()
    {
        $this->_client = new Client();
    }

    /**
     * Attempt HTTP Get request
     *
     * @param string $url     must be string
     * @param array  $payload must be array
     *
     * @return bool|mixed|string
     */
    public function get(string $url, array $payload)
    {
        return $this->_request(self::GET, $url, $payload);
    }

    /**
     * Attempt HTTP POST request
     *
     * @param string $url     must be string
     * @param array  $payload must be array
     *
     * @return bool|mixed|string
     */
    public function post(string $url, array $payload)
    {
        return $this->_request(self::POST, $url, $payload);
    }

    /**
     * Attempt HTTP PUT request
     *
     * @param string $url     must be string
     * @param array  $payload must be array
     *
     * @return bool|mixed|string
     */
    public function put(string $url, array $payload)
    {
        return $this->_request(self::PUT, $url, $payload);
    }

    /**
     * Attempt HTTP PATCH request
     *
     * @param string $url     must be string
     * @param array  $payload must be array
     *
     * @return bool|mixed|string
     */
    public function patch(string $url, array $payload)
    {
        return $this->_request(self::PATCH, $url, $payload);
    }

    /**
     * Attempt HTTP DELETE request
     *
     * @param string $url     must be string
     * @param array  $payload must be array
     *
     * @return bool|mixed|string
     */
    public function delete(string $url, array $payload)
    {
        return $this->_request(self::DELETE, $url, $payload);
    }

    /**
     * Set Request Header && Body
     *
     * @param array $payload must be array
     *
     * @return array
     */
    private function _setOptions(array $payload): array
    {
        return [
            'headers' => $this->_setHeaders($payload),
            'body'    => $this->_setBody($payload)
        ];
    }

    /**
     * Set Request Headers
     *
     * @param array $payload must be array
     *
     * @return array
     */
    private function _setHeaders(array $payload): array
    {
        return [
            'Connection'    => 'keep-alive',
            'Content-Type'  => self::CONTENT_TYPE,
            'Authorization' => isset($payload['_token']) ?
                self::AUTHORIZATION . $payload['_token'] : null
        ];
    }

    /**
     * Set Request Body
     *
     * @param array $data must be array
     *
     * @return string|null
     */
    private function _setBody(array $data)
    {
        return \GuzzleHttp\json_encode($data);
    }

    /**
     * Call Convo Api
     *
     * @param string $method  must be string
     * @param string $url     must be string
     * @param array  $options must be array
     *
     * @return bool|string|null
     */
    private function _request(string $method, string $url, array $options)
    {
        try
        {
            $response = $this->_client->request(
                $method, $url, $this->_setOptions($options)
            );
            $response = new HttpResponse($response);
            return $response->getResponse();
        }

        // Handle Guzzle Client Exception
        catch (ClientException $c_exception)
        {
            $exception = new ConvoHttpException($c_exception);
            return $exception->throwException();
        }

        // Handle Guzzle Request Exception
        catch (RequestException $r_exception)
        {
            $exception = new ConvoHttpException($r_exception);
            return $exception->throwException();
        }
    }
}