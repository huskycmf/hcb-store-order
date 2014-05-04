<?php
namespace HcbStoreOrder\Entity\Order;

use HcCore\Entity\EntityInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="store_order_has_product")
 * @ORM\Entity
 */
class Product implements EntityInterface
{
    /**
     * @var \HcbStoreProduct\Entity\Product
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="\HcbStoreProduct\Entity\Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="store_product_id", referencedColumnName="id")
     * })
     */
    private $product;

    /**
     * @var \HcbStoreOrder\Entity\Order
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="\HcbStoreOrder\Entity\Order", inversedBy="product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="store_order_id", referencedColumnName="id")
     * })
     */
    private $order;

    /**
     * @var integer
     *
     * @ORM\Column(name="count", type="integer", nullable=false)
     */
    private $count;

    /**
     * Set count
     *
     * @param integer $count
     * @return Product
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return integer 
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Set product
     *
     * @param \HcbStoreProduct\Entity\Product $product
     * @return Product
     */
    public function setProduct(\HcbStoreProduct\Entity\Product $product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \HcbStoreProduct\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set order
     *
     * @param \HcbStoreOrder\Entity\Order $order
     * @return Product
     */
    public function setOrder(\HcbStoreOrder\Entity\Order $order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \HcbStoreOrder\Entity\Order 
     */
    public function getOrder()
    {
        return $this->order;
    }
}
