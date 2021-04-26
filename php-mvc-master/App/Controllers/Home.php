<?php

namespace App\Controllers;

use \Core\View;
use App\Models\User;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $users = User::getAll();
        View::render('Home/index.php', ['variable' => $users]);
    }


}
