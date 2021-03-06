<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class Symfony_DI_PhpDumper_Test_Almost_Circular_Public extends Container
{
    private $parameters;
    private $targetDirs = array();
    private $privates = array();

    public function __construct()
    {
        $this->services = $this->privates = array();
        $this->methodMap = array(
            'bar' => 'getBarService',
            'bar3' => 'getBar3Service',
            'foo' => 'getFooService',
            'foo2' => 'getFoo2Service',
            'foo4' => 'getFoo4Service',
            'foobar' => 'getFoobarService',
            'foobar2' => 'getFoobar2Service',
            'foobar3' => 'getFoobar3Service',
            'foobar4' => 'getFoobar4Service',
        );

        $this->aliases = array();
    }

    public function reset()
    {
        $this->privates = array();
        parent::reset();
    }

    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled()
    {
        return true;
    }

    public function getRemovedIds()
    {
        return array(
            'Psr\\Container\\ContainerInterface' => true,
            'Symfony\\Component\\DependencyInjection\\ContainerInterface' => true,
            'bar2' => true,
        );
    }

    /**
     * Gets the public 'bar' shared service.
     *
     * @return \BarCircular
     */
    protected function getBarService()
    {
        $this->services['bar'] = $instance = new \BarCircular();

        $instance->addFoobar(($this->services['foobar'] ?? $this->getFoobarService()));

        return $instance;
    }

    /**
     * Gets the public 'bar3' shared service.
     *
     * @return \BarCircular
     */
    protected function getBar3Service()
    {
        $this->services['bar3'] = $instance = new \BarCircular();

        $a = ($this->services['foobar3'] ?? $this->services['foobar3'] = new \FoobarCircular());

        $instance->addFoobar($a, $a);

        return $instance;
    }

    /**
     * Gets the public 'foo' shared service.
     *
     * @return \FooCircular
     */
    protected function getFooService()
    {
        $a = ($this->services['bar'] ?? $this->getBarService());

        if (isset($this->services['foo'])) {
            return $this->services['foo'];
        }

        return $this->services['foo'] = new \FooCircular($a);
    }

    /**
     * Gets the public 'foo2' shared service.
     *
     * @return \FooCircular
     */
    protected function getFoo2Service()
    {
        $a = new \BarCircular();

        $this->services['foo2'] = $instance = new \FooCircular($a);

        $a->addFoobar(($this->services['foobar2'] ?? $this->getFoobar2Service()));

        return $instance;
    }

    /**
     * Gets the public 'foo4' service.
     *
     * @return \stdClass
     */
    protected function getFoo4Service()
    {
        $instance = new \stdClass();

        $instance->foobar = ($this->services['foobar4'] ?? $this->getFoobar4Service());

        return $instance;
    }

    /**
     * Gets the public 'foobar' shared service.
     *
     * @return \FoobarCircular
     */
    protected function getFoobarService()
    {
        $a = ($this->services['foo'] ?? $this->getFooService());

        if (isset($this->services['foobar'])) {
            return $this->services['foobar'];
        }

        return $this->services['foobar'] = new \FoobarCircular($a);
    }

    /**
     * Gets the public 'foobar2' shared service.
     *
     * @return \FoobarCircular
     */
    protected function getFoobar2Service()
    {
        $a = ($this->services['foo2'] ?? $this->getFoo2Service());

        if (isset($this->services['foobar2'])) {
            return $this->services['foobar2'];
        }

        return $this->services['foobar2'] = new \FoobarCircular($a);
    }

    /**
     * Gets the public 'foobar3' shared service.
     *
     * @return \FoobarCircular
     */
    protected function getFoobar3Service()
    {
        return $this->services['foobar3'] = new \FoobarCircular();
    }

    /**
     * Gets the public 'foobar4' shared service.
     *
     * @return \stdClass
     */
    protected function getFoobar4Service()
    {
        $a = new \stdClass();

        $this->services['foobar4'] = $instance = new \stdClass($a);

        $a->foobar = $instance;

        return $instance;
    }
}
