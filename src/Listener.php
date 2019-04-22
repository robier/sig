<?php

namespace Robier\SIG;

/**
 * Class Listener
 */
class Listener
{

    /**
     * Registers many functions to one signal.
     *
     * @param Signal $signal
     * @param \callable[] ...$functions
     * @return Listener
     */
    public function on(Signal $signal, callable ...$functions): self
    {
        foreach ($functions as $function) {
            pcntl_signal($signal->get(), $function);
        }

        return $this;
    }

    /**
     * Registers function that will throw provided exception to provided signals.
     *
     * @param \Throwable $e
     * @param Signal[] ...$signals
     * @return Listener
     */
    public function exceptionOn(\Throwable $e, Signal ...$signals): self
    {
        foreach ($signals as $signal){
            $this->on($signal, function() use ($e){
                throw $e;
            });
        }

        return $this;
    }

    /**
     * Registers one function for many signals.
     *
     * @param callable $function
     * @param Signal[] ...$signals
     * @return Listener
     */
    public function callableOn(callable $function, Signal ...$signals): self
    {
        foreach ($signals as $signal){
            $this->on($signal, $function);
        }

        return $this;
    }

    /**
     * Check for dispatched signals.
     *
     * @return bool
     */
    public function check(): bool
    {
        return pcntl_signal_dispatch();
    }
}
