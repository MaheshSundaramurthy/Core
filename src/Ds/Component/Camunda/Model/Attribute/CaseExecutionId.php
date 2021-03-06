<?php

namespace Ds\Component\Camunda\Model\Attribute;

/**
 * Trait CaseExecutionId
 *
 * @package Ds\Component\Camunda
 */
trait CaseExecutionId
{
    /**
     * @var string
     */
    protected $caseExecutionId; # region accessors

    /**
     * Set case execution id
     *
     * @param string $caseExecutionId
     * @return object
     */
    public function setCaseExecutionId($caseExecutionId)
    {
        $this->caseExecutionId = $caseExecutionId;

        return $this;
    }

    /**
     * Get case execution id
     *
     * @return string
     */
    public function getCaseExecutionId()
    {
        return $this->caseExecutionId;
    }

    # endregion
}
