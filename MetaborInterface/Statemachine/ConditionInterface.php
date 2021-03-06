<?php
namespace MetaborInterface\Statemachine;
use MetaborInterface\NamedInterface;
use ArrayAccess;

/**
 *
 * @author Oliver Tischlinger
 *        
 */
interface ConditionInterface extends NamedInterface {
	
	/**
	 *
	 * @param object $subject        	
	 * @param ArrayAccess $context        	
	 * @return boolean
	 */
	public function checkCondition($subject, ArrayAccess $context);
}