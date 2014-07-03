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
     * @var float
     *
     * @ORM\Column(name="total", type="float", nullable=false)
     */
    private $total = 0;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    private $status = 1;

    /**
     * @var boolean
     *
     * @ORM\Column(name="install", type="boolean", nullable=false)
     */
    private $install = false;

    /**
     * @var integer
     *
     * @ORM\Column(name="payment_method", type="integer", nullable=false)
     */
    private $paymentMethod = 1;

    /**
     * @var \HcbStoreOrder\Entity\Order\Product
     *
     * @ORM\OneToMany(targetEntity="HcbStoreOrder\Entity\Order\Product", mappedBy="order", cascade={"persist"})
     */
    protected $product;

    /**
     * @var \HcbStoreOrder\Entity\Order\Product\Selection
     *
     * @ORM\OneToMany(targetEntity="HcbStoreOrder\Entity\Order\Product\Selection", mappedBy="order", cascade={"persist"})
     */
    protected $selection;

    /**
     * @var string
     *
     * @ORM\Column(name="name", length=300, type="string", nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", length=100, type="string", nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", length=30, type="string", nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="country", length=100, type="string", nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="delivery", length=100, type="string", nullable=false)
     */
    private $delivery;

    /**
     * @var string
     *
     * @ORM\Column(name="city", length=100, type="string", nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", nullable=false)
     */
    private $comment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_timestamp", type="datetime", nullable=false)
     */
    private $createdTimestamp;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
        $this->selection = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set total
     *
     * @param float $total
     * @return Order
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Order
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set install
     *
     * @param boolean $install
     * @return Order
     */
    public function setInstall($install)
    {
        $this->install = $install;

        return $this;
    }

    /**
     * Get install
     *
     * @return boolean 
     */
    public function getInstall()
    {
        return $this->install;
    }

    /**
     * Set paymentMethod
     *
     * @param integer $paymentMethod
     * @return Order
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * Get paymentMethod
     *
     * @return integer 
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Order
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Order
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Order
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Order
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set delivery
     *
     * @param string $delivery
     * @return Order
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;

        return $this;
    }

    /**
     * Get delivery
     *
     * @return string 
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Order
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Order
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set createdTimestamp
     *
     * @param \DateTime $createdTimestamp
     * @return Order
     */
    public function setCreatedTimestamp($createdTimestamp)
    {
        $this->createdTimestamp = $createdTimestamp;

        return $this;
    }

    /**
     * Get createdTimestamp
     *
     * @return \DateTime 
     */
    public function getCreatedTimestamp()
    {
        return $this->createdTimestamp;
    }

    /**
     * Add product
     *
     * @param \HcbStoreOrder\Entity\Order\Product $product
     * @return Order
     */
    public function addProduct(\HcbStoreOrder\Entity\Order\Product $product)
    {
        $this->product[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \HcbStoreOrder\Entity\Order\Product $product
     */
    public function removeProduct(\HcbStoreOrder\Entity\Order\Product $product)
    {
        $this->product->removeElement($product);
    }

    /**
     * Get product
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Add selection
     *
     * @param \HcbStoreOrder\Entity\Order\Product\Selection $selection
     * @return Order
     */
    public function addSelection(\HcbStoreOrder\Entity\Order\Product\Selection $selection)
    {
        $this->selection[] = $selection;

        return $this;
    }

    /**
     * Remove selection
     *
     * @param \HcbStoreOrder\Entity\Order\Product\Selection $selection
     */
    public function removeSelection(\HcbStoreOrder\Entity\Order\Product\Selection $selection)
    {
        $this->selection->removeElement($selection);
    }

    /**
     * Get selection
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSelection()
    {
        return $this->selection;
    }
}
