<?php
/**
 * Erzeugungsmuster Fassade
 *
 * + Im 'Fassade' Objekt wird nur ein Teil der public method
 * des konkreten Objektes freigegeben.
 *
 * @author Stephan.Krauss
 * @date 05.27.2013
 * @file fassade.php
 */

class user
{
    private $user = null;

    function __construct()
    {
    }

    /**
     * @param null $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return null
     */
    public function getUser()
    {
        return $this->user;
    }
}

class fassade{
    /** @var user  */
    private $userObject = null;

    public function __constuct(user $user)
    {
        $this->userObject = $user;
    }

    public function getUser()
    {
        $this->userObject->getUser();
    }
}

$user = new user();
$fassade = new fassade($user);
