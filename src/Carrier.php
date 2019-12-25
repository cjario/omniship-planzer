<?php

namespace Omniship\Planzer;

use Omniship\Common\AbstractCarrier;
use Omniship\Common\Helper;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Planzer Carrier provides a wrapper for Planzer API.
 * Please have a look at the official documentation to have a high-level overview and see the API specification
 */
class Carrier extends AbstractCarrier
{

    public function getName()
    {
        return 'Planzer';
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->getParameter('apiKey');
    }
    /**
     * @param  string $value
     * @return $this
     */
    public function setApiKey($value)
    {
        return $this->setParameter('apiKey', $value);
    }

    /**
     * Initialize this carrier with default parameters
     *
     * @param  array $parameters
     * @return $this
     */
    public function initialize(array $parameters = array())
    {
        $this->parameters = new ParameterBag;

        // set default parameters
        foreach ($this->getDefaultParameters() as $key => $value) {
            if (is_array($value)) {
                $this->parameters->set($key, reset($value));
            } else {
                $this->parameters->set($key, $value);
            }
        }

        Helper::initialize($this, $parameters);


        return $this;
    }

    public function getDefaultParameters()
    {
        
        $settings = parent::getDefaultParameters();
        return $settings;
    }

    public function upload(array $parameters = [])
    {
        return $this->createRequest('\Omniship\Planzer\Message\Request\UploadRequest', $parameters);
    }
}
