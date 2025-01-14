<?php

/**
 * Copyright © Alexandru-Manuel Carabus All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Hawksama\HyvaCheckoutUsedProductNotice\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Hawksama\HyvaUsedProductNotice\Model\Config as UsedProductConfig;

class Config
{
    public const ENABLED_ON_CHECKOUT_PAGE = 'used_product/main/enable_confirmation_on_checkout';

    public function __construct(
        protected ScopeConfigInterface $scopeConfig,
        private readonly UsedProductConfig $config
    ) {
    }

    public function isEnabledConfirmationOnCheckout(): bool
    {
        return $this->config->isEnabled() && $this->scopeConfig->isSetFlag(
            self::ENABLED_ON_CHECKOUT_PAGE,
            ScopeInterface::SCOPE_STORES
        );
    }
}
