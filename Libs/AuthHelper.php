<?php
class AuthHelper
{
    // Constructor
    public function __construct()
    {
        
    }

    /**
     * This class provides helper functions for authentication processes.
     * 
     * @method bool IsAuth() Checks if a user is authenticated by verifying the session.
     * @return bool Returns true if user is authenticated, otherwise false.
     */
    function IsAuth()
    {
        return isset($_SESSION['User']);
    }

    /**
     * Fetches the authenticated user if available.
     * 
     * @return mixed Returns User object if authenticated, otherwise false.
     */
    function getUser()
    {
        return $this->IsAuth() ? $_SESSION['User'] : false;
    }
}
