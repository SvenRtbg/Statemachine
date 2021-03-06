<?php
namespace Metabor\Callback;

use MetaborInterface\CallbackInterface;
use SplObjectStorage;

/**
 *
 * @author Oliver Tischlinger
 *        
 */
class Composite implements CallbackInterface
{

    /**
     *
     * @var \SplObjectStorage
     */
    private $callbacks;

    /**
     */
    public function __construct ()
    {
        $this->callbacks = new SplObjectStorage();
    }

    /**
     *
     * @see MetaborInterface.CallbackInterface::__invoke()
     */
    public function __invoke ()
    {
        $args = func_get_args();
        foreach ($this->callbacks as $callback) {
            if ($args) {
                call_user_func_array($callback, $args);
            } else {
                $callback();
            }
        }
    }

    /**
     *
     * @param CallbackInterface $callback            
     */
    public function attach (CallbackInterface $callback)
    {
        $this->callbacks->attach($callback);
    }

    /**
     *
     * @param CallbackInterface $callback            
     */
    public function detach (CallbackInterface $callback)
    {
        $this->callbacks->detach($callback);
    }

}
