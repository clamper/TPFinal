<?php

namespace DAO;

use Model\User as User;

interface IUserDAO
{
    function GetUserByID($id);
    function GetUserByEmail($email);    
    function addUser(User $user);
    function resetPass($mail, $newpass);
    function Delete($UserID);
}

?>