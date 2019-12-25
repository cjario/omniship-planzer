<?php

namespace Omniship\Planzer\Message\Response;

use Omniship\Common\Message\AbstractResponse;

class UploadResponse extends AbstractResponse
{
    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        if (!empty($this->data)) {
            return true;
        }
        return false;
    }

}
