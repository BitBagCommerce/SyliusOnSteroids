<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Sylius\Bundle\CoreBundle\Application\Kernel;

/**
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 * @author Gonzalo Vilaseca <gvilaseca@reiss.co.uk>
 */
class AppKernel extends Kernel
{
    /**
     * {@inheritdoc}
     */
    public function registerBundles(): array
    {
        $bundles = [
            new \Sylius\Bundle\AdminBundle\SyliusAdminBundle(),
            new \Sylius\Bundle\ShopBundle\SyliusShopBundle(),

            new \FOS\OAuthServerBundle\FOSOAuthServerBundle(), // Required by SyliusAdminApiBundle.
            new \Sylius\Bundle\AdminApiBundle\SyliusAdminApiBundle(),

            new \FOS\ElasticaBundle\FOSElasticaBundle(),
            new \BitBag\SyliusElasticsearchPlugin\BitBagSyliusElasticsearchPlugin(),
            new \BitBag\SyliusCmsPlugin\BitBagSyliusCmsPlugin(),
            new \BitBag\SyliusMolliePlugin\BitBagSyliusMolliePlugin(),
            new \BitBag\SyliusWishlistPlugin\BitBagSyliusWishlistPlugin(),
            new \BitBag\SyliusShippingExportPlugin\BitBagSyliusShippingExportPlugin(),
            new BitBag\Dhl24PlShippingExportPlugin\Dhl24PlShippingExportPlugin(),
            new \BitBag\SyliusPrzelewy24Plugin\SyliusPrzelewy24Plugin(),
            new \BitBag\SyliusMailChimpPlugin\BitBagSyliusMailChimpPlugin(),
            new \BitBag\SyliusPayUPlugin\BitBagSyliusPayUPlugin(),
            new \Knp\Bundle\SnappyBundle\KnpSnappyBundle(),
            new \BitBag\SyliusInvoicingPlugin\BitBagSyliusInvoicingPlugin(),
            new \BitBag\MercanetBnpParibasPlugin\BitBagMercanetBnpParibasPlugin(),
            new \BitBag\SyliusAdyenPlugin\BitBagSyliusAdyenPlugin(),

            new \AppBundle\AppBundle(),
        ];

        return array_merge(parent::registerBundles(), $bundles);
    }
}
