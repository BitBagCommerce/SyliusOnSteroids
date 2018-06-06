<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use BitBag\SyliusAclPlugin\Model\RoleableTrait;
use BitBag\SyliusAclPlugin\Model\ToggleablePermissionCheckerTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Sylius\Component\Core\Model\AdminUser as BaseAdminUser;

class AdminUser extends BaseAdminUser
{
    use ToggleablePermissionCheckerTrait;
    use RoleableTrait;

    public function __construct()
    {
        parent::__construct();

        $this->rolesResources = new ArrayCollection();
    }
}
