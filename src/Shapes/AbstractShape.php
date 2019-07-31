<?php

namespace GraphicEditor\Shapes;

abstract class AbstractShape
{
    /** @var array */
    protected $attributes = [];

    /**
     * AbstractShape constructor.
     * @param array $attributes
     */
    final public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @param array $attributes
     * @return bool
     */
    abstract public function validateAttributes(array $attributes) : bool;

    /**
     * @param string $key
     * @return bool
     */
    public function hasAttribute(string $key) : bool
    {
        return array_key_exists($key, $this->attributes);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getAttribute(string $key)
    {
        if(! $this->hasAttribute($key)){
            throw new \LogicException("The" . $key . "attribute is required");
        }

        return $this->attributes[$key];
    }

    public function getAttributes()
    {
        return $this->attributes;
    }


}
