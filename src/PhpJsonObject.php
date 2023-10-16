<?php

namespace Vanengers\PhpJsonObjectLibrary;

use Exception;
use Throwable;

abstract class PhpJsonObject
{
    /** @var array $mappers */
    public $mappers = [];

    /** @var array $exclude_from_array */
    public $exclude_from_array = [];

    /** @var array $hard_exclude_from_array */
    private $hard_exclude_from_array = [
        'mappers',
        'exclude_from_array',
        'hard_exclude_from_array'
    ];

    /**
     * @param $jsonOrArray
     * @throws Exception
     */
    public function __construct($jsonOrArray = null)
    {
        if (!is_null($jsonOrArray)) {
            if (is_array($jsonOrArray)) {
                $this->fromArray($jsonOrArray);
            } else {
                $this->fromJson($jsonOrArray);
            }
        }
    }

    /**
     * @param $json
     * @return void
     * @throws Exception
     * @since 16-10-2023
     * @author George van Engers <george@dewebsmid.nl>
     */
    public function fromJson($json)
    {
        $array = json_decode($json, true);
        if ($array == NULL ) {
            throw new Exception('Invalid JSON');
        }
        $this->fromArray($array);
    }

    /**
     * @param $data
     * @return void
     * @author George van Engers <george@dewebsmid.nl>
     * @since 16-10-2023
     */
    public function fromArray($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $value = $this->filterValue($value);
                if (array_key_exists(strtolower($key), $this->mappers)) {
                    $key = $this->mappers[strtolower($key)];
                } else if (array_key_exists($key, $this->mappers)) {
                    $key = $this->mappers[$key];
                }

                if (method_exists($this, 'set' . ucfirst(strtolower($key)))) {
                    call_user_func_array([$this, 'set' . ucfirst(strtolower($key))], ['data' => $value]);
                } else if (property_exists($this, strtolower($key))) {
                    $this->{strtolower($key)} = $value;
                }
            }
        }
    }

    /**
     * @param array $configuration
     *  Example of configuration array:
     *  [
     *       'skip' => [], // array_keys
     *       'skip_null' => [] // array_keys
     *       'skip_empty' => [] // array_keys
     *  ]
     * @return false|string
     * @author George van Engers <george@dewebsmid.nl>
     * @since 16-10-2023
     */
    public function toJson(array $configuration = [])
    {
        return json_encode($this->toArray());
    }

    /**
     * @return array
     * @author George van Engers <george@dewebsmid.nl>
     * @since 16-10-2023
     */
    /**
     * @param $configuration
     * @param $key
     * @param $value
     * @return bool
     * @author George van Engers <george@dewebsmid.nl>
     * @since 15-09-2023
     */
    private function skippable($configuration, $key, $value): bool
    {
        if (is_array($configuration)) {
            if (array_key_exists('skip', $configuration) && is_array($configuration['skip'])) {
                if (in_array($key, $configuration['skip'])) {
                    return true;
                }
            }

            if (array_key_exists('skip_null', $configuration) && is_array($configuration['skip_null'])) {
                if (in_array($key, $configuration['skip_null'])) {
                    if (is_null($value)) {
                        return true;
                    }
                }
            }

            if (array_key_exists('skip_empty', $configuration) && is_array($configuration['skip_empty'])) {
                if (in_array($key, $configuration['skip_empty'])) {
                    if (empty($value)) {
                        return true;
                    }
                }
            }
        }

        return false;
    }

    /**
     * @param array $configuration
     * Example of configuration array:
     * [
     *      'skip' => [], // array_keys
     *      'skip_null' => [] // array_keys
     *      'skip_empty' => [] // array_keys
     * ]
     * @return array
     * @author george@dewebsmid.nl
     * @since 06-07-2022
     */
    public function toArray(array $configuration = []): array
    {
        $array = [];
        foreach ($this as $key => $value) {
            if (in_array($key, $this->exclude_from_array)) {
                continue;
            }

            if (in_array($key, $this->hard_exclude_from_array)) {
                continue;
            }

            if (is_object($value)) {
                $array[$key] = $value->toArray();
            }
            else if (is_array($value)) {
                foreach($value as $k => $v) {
                    $array[$key][$k] = $v->toArray();
                }
            }
            else if (!$this->skippable($configuration, $key, $value)) {
                $array[$key] = $value;
            }
        }
        return $array;
    }

    /**
     * @param $value
     * @return mixed
     * @author George van Engers <george@dewebsmid.nl>
     * @since 16-10-2023
     */
    private function filterValue($value)
    {
        // sometimes we get a string with a number, but we want an integer
        // or we get a string with a boolean, but we want a boolean
        // or we get a string with null but we want a null

        if (is_numeric($value)) {
            if (strpos($value, '.') !== false) {
                return floatval($value);
            }
            return intval($value);
        }

        if ($value == 'true') {
            return true;
        }
        else if ($value == 'false') {
            return false;
        }
        else if ($value == 'null') {
            return null;
        }

        return $value;
    }
}