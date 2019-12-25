<?php

namespace Omniship\Planzer\Message\Request;

use Omniship\Planzer\Message\Response\UploadResponse;
use Omniship\Common\Message\ResponseInterface;

class UploadRequest extends AbstractRequest
{


    protected $endpoint = '/shipping/v2/shipments';

    /**
     * @return array
     * @throws \Omniship\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate('clientId', 'clientSecret');

        return [];
    }


    /**
     * Send the request with specified data
     *
     * @param  mixed $data The data to send
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        $response = $this->sendRequest(self::GET, $this->endpoint, null, null);
        return $this->response = new UploadResponse($this, $response);
    }
}
