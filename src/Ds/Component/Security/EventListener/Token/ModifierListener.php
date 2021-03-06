<?php

namespace Ds\Component\Security\EventListener\Token;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTDecodedEvent;
use OutOfRangeException;

/**
 * Class ModifierListener
 *
 * @package Ds\Component\Security
 */
class ModifierListener
{
    /**
     * @var array
     */
    protected $attributes;

    /**
     * Constructor
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    /**
     * Remove attributes from the token
     *
     * @param \Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent $event
     * @throws \OutOfRangeException
     */
    public function created(JWTCreatedEvent $event)
    {
        $payload = $event->getData();

        foreach ($this->attributes as $attribute) {
            if (!array_key_exists($attribute, $payload)) {
                throw new OutOfRangeException('Payload attribute does not exist.');
            }

            unset($payload[$attribute]);
        }

        $event->setData($payload);
    }

    /**
     * Mark the token as invalid if the token still contains removed attributes
     *
     * @param \Lexik\Bundle\JWTAuthenticationBundle\Event\JWTDecodedEvent $event
     */
    public function decoded(JWTDecodedEvent $event)
    {
        $payload = $event->getPayload();

        foreach ($this->attributes as $attribute) {
            if (array_key_exists($attribute, $payload)) {
                $event->markAsInvalid();
                break;
            }
        }
    }
}
