<?php

namespace Pmclain\OneClickCheckout\Model\QuoteBuilder;

use Pmclain\OneClickCheckout\Model\DefaultPaymentProvider;

class PaymentBuilder
{
    /**
     * @var DefaultPaymentProvider
     */
    protected $defaultPaymentProvider;

    /**
     * PaymentBuilder constructor.
     * @param DefaultPaymentProvider $defaultPaymentProvider
     * @param VaultPool $vaultPool
     */
    public function __construct(
        DefaultPaymentProvider $defaultPaymentProvider
    ) {
        $this->defaultPaymentProvider = $defaultPaymentProvider;
    }

    /**
     * @param \Magento\Quote\Model\Quote $quote
     */
    public function setPaymentMethod($quote)
    {
        $token = $this->defaultPaymentProvider->getDefaultPayment();
        $quote->getBillingAddress()->setPaymentMethod('checkmo');

        if (!$quote->isVirtual()) {
            $quote->getShippingAddress()->setCollectShippingRates(true);
        }
    }
}
