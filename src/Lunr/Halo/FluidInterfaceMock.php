<?php

/**
 * This file contains the FluidInterfaceMock.
 *
 * @package    Lunr\Halo
 * @author     Heinz Wiesinger <heinz@m2mobi.com>
 * @copyright  2014-2018, M2Mobi BV, Amsterdam, The Netherlands
 * @license    http://lunr.nl/LICENSE MIT License
 */

namespace Lunr\Halo;

/**
 * This mock class can be used to more efficiently mock fluid interface calls.
 */
class FluidInterfaceMock
{

    /**
     * Array of mocked return values
     * @var array
     */
    protected $return;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->return = [];
    }

    /**
     * Destructor.
     */
    public function __destruct()
    {
        unset($this->return);
    }

    /**
     * Handle fluid interface calls.
     *
     * @param string $name      Method name
     * @param array  $arguments Method arguments
     *
     * @return mixed $return Stored return value or a self reference
     */
    public function __call($name, $arguments)
    {
        if (array_key_exists($name, $this->return))
        {
            return array_pop($this->return[$name]);
        }
        else
        {
            return $this;
        }
    }

    /**
     * Specifically mock a certain method call.
     *
     * @param string $name  Method name
     * @param mixed  $value Mocked return value
     *
     * @return void
     */
    public function mock($name, $value)
    {
        if (!array_key_exists($name, $this->return))
        {
            $this->return[$name] = [];
        }

        array_push($this->return[$name], $value);
    }

}

?>
