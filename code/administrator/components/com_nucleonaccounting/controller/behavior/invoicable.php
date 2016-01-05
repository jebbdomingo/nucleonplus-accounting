<?php
/**
 * Nucleon Plus Accounting
 *
 * @package     Nucleon Plus Accounting
 * @copyright   Copyright (C) 2015 - 2020 Nucleon Plus Co. (http://www.nucleonplus.com)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/jebbdomingo/nucleonplus for the canonical source repository
 */

/**
 * Used by the order controller to create corresponding invoice upon placing an order
 *
 * @author  Jebb Domingo <https://github.com/jebbdomingo>
 */
class ComNucleonaccountingControllerBehaviorInvoicable extends KControllerBehaviorAbstract
{
    /**
     * Invoice controller identifier.
     *
     * @param string|KObjectIdentifierInterface
     */
    protected $_controller;

    /**
     * Constructor.
     *
     * @param KObjectConfig $config Configuration options.
     */
    public function __construct(KObjectConfig $config)
    {
        parent::__construct($config);

        $this->_controller = $config->controller;
    }

    /**
     * Initializes the options for the object.
     *
     * Called from {@link __construct()} as a first step of object instantiation.
     *
     * @param KObjectConfig $config Configuration options.
     */
    protected function _initialize(KObjectConfig $config)
    {
        $config->append(array(
            'controller' => 'com:nucleonaccounting.controller.invoice'
        ));

        parent::_initialize($config);
    }

    /**
     * Create an Invoice
     *
     * @todo define an array of entity fields to map to invoice fields
     *
     * @param KControllerContextInterface $context
     *
     * @return void
     */
    protected function _afterAdd(KControllerContextInterface $context)
    {
        $entity = $context->result; // Order entity
        $data   = array(
            'package'      => $context->getSubject()->getIdentifier()->package,
            'customer_id'  => $entity->account_number,
            'order_id'     => $entity->id, // Order ID
            'product_name' => $entity->package_name,
            'amount'       => $entity->package_price
        );

        $controller = $this->getObject($this->_controller);

        if ($controller instanceof KControllerModellable) {
            $controller->add($data);
        }
    }
}