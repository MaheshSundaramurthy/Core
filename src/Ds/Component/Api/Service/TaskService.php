<?php

namespace Ds\Component\Api\Service;

use Ds\Component\Api\Model\Task;
use Ds\Component\Api\Query\TaskParameters as Parameters;

/**
 * Class TaskService
 *
 * @package Ds\Component\Api
 */
class TaskService extends AbstractService
{
    /**
     * @const string
     */
    const MODEL = Task::class;

    /**
     * @const string
     */
    const RESOURCE_LIST = '/tasks';
    const RESOURCE_OBJECT = '/tasks/{id}';

    /**
     * @var array
     */
    protected static $map = [
        'uuid'
    ];

    /**
     * Get task list
     *
     * @param \Ds\Component\Api\Query\TaskParameters $parameters
     * @return array
     */
    public function getList(Parameters $parameters = null)
    {
        $objects = $this->execute('GET', 'http://www.mocky.io/v2/592b798d100000b10e389778');
        $list = [];

        foreach ($objects as $object) {
            $model = static::toModel($object);
            $list[] = $model;
        }

        return $list;
    }
}
