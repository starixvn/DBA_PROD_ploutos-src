<?php

namespace PandoraBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rpndepositrequests
 *
 * @ORM\Table(name="RpnDepositRequests", uniqueConstraints={@ORM\UniqueConstraint(name="OrderId", columns={"OrderId"})})
 * @ORM\Entity
 */
class Rpndepositrequests
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="PlayerRegistrationId", type="bigint", nullable=true)
     */
    private $playerregistrationid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="PlayerAccountNo", type="string", length=50, nullable=true)
     */
    private $playeraccountno;

    /**
     * @var string
     *
     * @ORM\Column(name="PlayerUserName", type="string", length=50, nullable=true)
     */
    private $playerusername;

    /**
     * @var string
     *
     * @ORM\Column(name="Version", type="string", length=10, nullable=true)
     */
    private $version;

    /**
     * @var string
     *
     * @ORM\Column(name="SignType", type="string", length=10, nullable=true)
     */
    private $signtype;

    /**
     * @var string
     *
     * @ORM\Column(name="MerchantNo", type="string", length=30, nullable=true)
     */
    private $merchantno;

    /**
     * @var string
     *
     * @ORM\Column(name="OrderId", type="string", length=50, nullable=true)
     */
    private $orderid;

    /**
     * @var float
     *
     * @ORM\Column(name="OrderAmount", type="float", precision=10, scale=0, nullable=true)
     */
    private $orderamount = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="OrderTime", type="datetime", nullable=true)
     */
    private $ordertime;

    /**
     * @var string
     *
     * @ORM\Column(name="BankCode", type="string", length=10, nullable=true)
     */
    private $bankcode;

    /**
     * @var integer
     *
     * @ORM\Column(name="BankId", type="bigint", nullable=true)
     */
    private $bankid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="Signature", type="string", length=50, nullable=true)
     */
    private $signature;

    /**
     * @var integer
     *
     * @ORM\Column(name="DepositId", type="bigint", nullable=true)
     */
    private $depositid = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="ReturnUrl", type="text", nullable=true)
     */
    private $returnurl;

    /**
     * @var string
     *
     * @ORM\Column(name="CallbackUrl", type="text", nullable=true)
     */
    private $callbackurl;

    /**
     * @var string
     *
     * @ORM\Column(name="RedirectUrl", type="text", nullable=true)
     */
    private $redirecturl;

    /**
     * @var string
     *
     * @ORM\Column(name="CreatedById", type="string", length=255, nullable=true)
     */
    private $createdbyid;

    /**
     * @var string
     *
     * @ORM\Column(name="ModifiedById", type="string", length=255, nullable=true)
     */
    private $modifiedbyid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreated", type="datetime", nullable=true)
     */
    private $datecreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateModified", type="datetime", nullable=true)
     */
    private $datemodified;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ActiveRecord", type="boolean", nullable=true)
     */
    private $activerecord = '1';



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
     * Set playerregistrationid
     *
     * @param integer $playerregistrationid
     *
     * @return Rpndepositrequests
     */
    public function setPlayerregistrationid($playerregistrationid)
    {
        $this->playerregistrationid = $playerregistrationid;

        return $this;
    }

    /**
     * Get playerregistrationid
     *
     * @return integer
     */
    public function getPlayerregistrationid()
    {
        return $this->playerregistrationid;
    }

    /**
     * Set playeraccountno
     *
     * @param string $playeraccountno
     *
     * @return Rpndepositrequests
     */
    public function setPlayeraccountno($playeraccountno)
    {
        $this->playeraccountno = $playeraccountno;

        return $this;
    }

    /**
     * Get playeraccountno
     *
     * @return string
     */
    public function getPlayeraccountno()
    {
        return $this->playeraccountno;
    }

    /**
     * Set playerusername
     *
     * @param string $playerusername
     *
     * @return Rpndepositrequests
     */
    public function setPlayerusername($playerusername)
    {
        $this->playerusername = $playerusername;

        return $this;
    }

    /**
     * Get playerusername
     *
     * @return string
     */
    public function getPlayerusername()
    {
        return $this->playerusername;
    }

    /**
     * Set version
     *
     * @param string $version
     *
     * @return Rpndepositrequests
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set signtype
     *
     * @param string $signtype
     *
     * @return Rpndepositrequests
     */
    public function setSigntype($signtype)
    {
        $this->signtype = $signtype;

        return $this;
    }

    /**
     * Get signtype
     *
     * @return string
     */
    public function getSigntype()
    {
        return $this->signtype;
    }

    /**
     * Set merchantno
     *
     * @param string $merchantno
     *
     * @return Rpndepositrequests
     */
    public function setMerchantno($merchantno)
    {
        $this->merchantno = $merchantno;

        return $this;
    }

    /**
     * Get merchantno
     *
     * @return string
     */
    public function getMerchantno()
    {
        return $this->merchantno;
    }

    /**
     * Set orderid
     *
     * @param string $orderid
     *
     * @return Rpndepositrequests
     */
    public function setOrderid($orderid)
    {
        $this->orderid = $orderid;

        return $this;
    }

    /**
     * Get orderid
     *
     * @return string
     */
    public function getOrderid()
    {
        return $this->orderid;
    }

    /**
     * Set orderamount
     *
     * @param float $orderamount
     *
     * @return Rpndepositrequests
     */
    public function setOrderamount($orderamount)
    {
        $this->orderamount = $orderamount;

        return $this;
    }

    /**
     * Get orderamount
     *
     * @return float
     */
    public function getOrderamount()
    {
        return $this->orderamount;
    }

    /**
     * Set ordertime
     *
     * @param \DateTime $ordertime
     *
     * @return Rpndepositrequests
     */
    public function setOrdertime($ordertime)
    {
        $this->ordertime = $ordertime;

        return $this;
    }

    /**
     * Get ordertime
     *
     * @return \DateTime
     */
    public function getOrdertime()
    {
        return $this->ordertime;
    }

    /**
     * Set bankcode
     *
     * @param string $bankcode
     *
     * @return Rpndepositrequests
     */
    public function setBankcode($bankcode)
    {
        $this->bankcode = $bankcode;

        return $this;
    }

    /**
     * Get bankcode
     *
     * @return string
     */
    public function getBankcode()
    {
        return $this->bankcode;
    }

    /**
     * Set bankid
     *
     * @param integer $bankid
     *
     * @return Rpndepositrequests
     */
    public function setBankid($bankid)
    {
        $this->bankid = $bankid;

        return $this;
    }

    /**
     * Get bankid
     *
     * @return integer
     */
    public function getBankid()
    {
        return $this->bankid;
    }

    /**
     * Set signature
     *
     * @param string $signature
     *
     * @return Rpndepositrequests
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * Get signature
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Set depositid
     *
     * @param integer $depositid
     *
     * @return Rpndepositrequests
     */
    public function setDepositid($depositid)
    {
        $this->depositid = $depositid;

        return $this;
    }

    /**
     * Get depositid
     *
     * @return integer
     */
    public function getDepositid()
    {
        return $this->depositid;
    }

    /**
     * Set returnurl
     *
     * @param string $returnurl
     *
     * @return Rpndepositrequests
     */
    public function setReturnurl($returnurl)
    {
        $this->returnurl = $returnurl;

        return $this;
    }

    /**
     * Get returnurl
     *
     * @return string
     */
    public function getReturnurl()
    {
        return $this->returnurl;
    }

    /**
     * Set callbackurl
     *
     * @param string $callbackurl
     *
     * @return Rpndepositrequests
     */
    public function setCallbackurl($callbackurl)
    {
        $this->callbackurl = $callbackurl;

        return $this;
    }

    /**
     * Get callbackurl
     *
     * @return string
     */
    public function getCallbackurl()
    {
        return $this->callbackurl;
    }

    /**
     * Set redirecturl
     *
     * @param string $redirecturl
     *
     * @return Rpndepositrequests
     */
    public function setRedirecturl($redirecturl)
    {
        $this->redirecturl = $redirecturl;

        return $this;
    }

    /**
     * Get redirecturl
     *
     * @return string
     */
    public function getRedirecturl()
    {
        return $this->redirecturl;
    }

    /**
     * Set createdbyid
     *
     * @param string $createdbyid
     *
     * @return Rpndepositrequests
     */
    public function setCreatedbyid($createdbyid)
    {
        $this->createdbyid = $createdbyid;

        return $this;
    }

    /**
     * Get createdbyid
     *
     * @return string
     */
    public function getCreatedbyid()
    {
        return $this->createdbyid;
    }

    /**
     * Set modifiedbyid
     *
     * @param string $modifiedbyid
     *
     * @return Rpndepositrequests
     */
    public function setModifiedbyid($modifiedbyid)
    {
        $this->modifiedbyid = $modifiedbyid;

        return $this;
    }

    /**
     * Get modifiedbyid
     *
     * @return string
     */
    public function getModifiedbyid()
    {
        return $this->modifiedbyid;
    }

    /**
     * Set datecreated
     *
     * @param \DateTime $datecreated
     *
     * @return Rpndepositrequests
     */
    public function setDatecreated($datecreated)
    {
        $this->datecreated = $datecreated;

        return $this;
    }

    /**
     * Get datecreated
     *
     * @return \DateTime
     */
    public function getDatecreated()
    {
        return $this->datecreated;
    }

    /**
     * Set datemodified
     *
     * @param \DateTime $datemodified
     *
     * @return Rpndepositrequests
     */
    public function setDatemodified($datemodified)
    {
        $this->datemodified = $datemodified;

        return $this;
    }

    /**
     * Get datemodified
     *
     * @return \DateTime
     */
    public function getDatemodified()
    {
        return $this->datemodified;
    }

    /**
     * Set activerecord
     *
     * @param boolean $activerecord
     *
     * @return Rpndepositrequests
     */
    public function setActiverecord($activerecord)
    {
        $this->activerecord = $activerecord;

        return $this;
    }

    /**
     * Get activerecord
     *
     * @return boolean
     */
    public function getActiverecord()
    {
        return $this->activerecord;
    }
}
