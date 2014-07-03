<?php
namespace HcbStoreOrder\Entity\Order\Product;

use HcCore\Entity\EntityInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="store_order_has_product_selection")
 * @ORM\Entity
 */
class Selection implements EntityInterface
{
    /**
     * @var \HcbStoreProduct\Entity\Product\Selection
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="\HcbStoreProduct\Entity\Product\Selection")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="store_product_selection_id", referencedColumnName="id")
     * })
     */
    private $selection;

    /**
     * @var \HcbStoreOrder\Entity\Order
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="\HcbStoreOrder\Entity\Order", inversedBy="selection")
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
     * @return Selection
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
     * Set selection
     *
     * @param \HcbStoreProduct\Entity\Product\Selection $selection
     * @return Selection
     */
    public function setSelection(\HcbStoreProduct\Entity\Product\Selection $selection)
    {
        $this->selection = $selection;

        return $this;
    }

    /**
     * Get selection
     *
     * @return \HcbStoreProduct\Entity\Product\Selection 
     */
    public function getSelection()
    {
        return $this->selection;
    }

    /**
     * Set order
     *
     * @param \HcbStoreOrder\Entity\Order $order
     * @return Selection
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
