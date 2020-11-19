<?php 

session_start();

function isLoggedIn()
{
    if(isset($_SESSION['username'])){
        if (($_SESSION['username']) == 'Admin') {
            return "Admin";
        } else {
            return "User";
        } 
    }
    else {
        return false;
    }
}