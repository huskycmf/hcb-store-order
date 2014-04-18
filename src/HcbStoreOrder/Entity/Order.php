<?php
namespace HcbStoreOrder\Entity;

use HcCore\Entity\EntityInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="store_order")
 * @ORM\Entity
 */
class Order implements EntityInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="total", type="integer", nullable=false)
     */
    private $total = false;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status = 1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_timestamp", type="datetime", nullable=false)
     */
    private $createdTimestamp;
}
