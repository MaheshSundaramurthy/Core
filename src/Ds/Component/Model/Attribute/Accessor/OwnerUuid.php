<?php

namespace Ds\Component\Model\Attribute\Accessor;

/**
 * Trait OwnerUuid
 *
 * @package Ds\Component\Model
 */
trait OwnerUuid
{
    /**
     * Set owner uuid
     *
     * @param string $ownerUuid
     * @return object
     */
    public function setOwnerUuid($ownerUuid)
    {
        $this->ownerUuid = $ownerUuid;

        return $this;
    }

    /**
     * Get owner uuid
     *
     * @return string
     */
    public function getOwnerUuid()
    {
        return $this->ownerUuid;
    }
}
