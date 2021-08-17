<?php

namespace App\Enums;

use App\Exceptions\InvalidEnumValueException;

abstract class Enum
{
    /**
     * Cached enum values.
     *
     * @var null|array
     */
    private static $constCacheArray = null;

    /**
     * Obtains array of constants
     *
     * @return array
     */
    public static function getConstants(): array
    {
        if (self::$constCacheArray == null) {
            self::$constCacheArray = [];
        }

        try {
            $calledClass = get_called_class();
            if (!array_key_exists($calledClass, self::$constCacheArray)) {
                $reflect = new \ReflectionClass($calledClass);
                self::$constCacheArray[$calledClass] = $reflect->getConstants();
            }

            return self::$constCacheArray[$calledClass];
        } catch (\ReflectionException $exception) {
            report($exception);
            return [];
        }
    }

    /**
     * Return all enum values.
     *
     * @return array
     */
    public static function getValues(): array
    {
        return array_values(self::getConstants());
    }

    /**
     * Verify if param is a existent constant
     *
     * @param  string  $name
     * @param  bool  $strict
     * @return bool
     */
    public static function isValidConstantName(string $name, $strict = true): bool
    {
        $constants = self::getConstants();

        if ($strict) {
            return array_key_exists($name, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($name), $keys);
    }

    /**
     * Verify if a passed value is a existent constant value.
     *
     * @param  mixed  $value
     * @param  bool  $strict
     * @return bool
     */
    public static function isValidValue($value, $strict = true): bool
    {
        $values = array_values(self::getConstants());
        return in_array($value, $values, $strict);
    }

    /**
     * Validate if a passed value is an existent constant value.
     * If does'n exists, it will be throw an exception.
     *
     * @param  mixed  $value
     * @param  bool  $strict
     * @return bool
     * @throws \App\Exceptions\InvalidEnumValueException
     */
    public static function validateValue($value, $strict = true): bool
    {
        if (!self::isValidValue($value, $strict)) {
            throw new InvalidEnumValueException("Invalid enum value [$value].");
        }

        return true;
    }

    /**
     * Return translated value. This method may be re-writed on children enum class.
     *
     * @param  mixed  $value
     * @return string
     */
    public static function trans($value): string
    {
        return (string) $value;
    }
}
