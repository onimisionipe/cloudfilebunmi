<?php

/*
 * Copyright (C) 2014
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

/**
 * Description of loginController
 *
 * @author Adeola Eletta - cuteangel1281@gmail.com
 * @version 1.1
 * 
 * 
 */
class registerController extends Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    /*
     * check or validate data...and filter data
     */
    public function index(){
        $user = CFactory::getUser();
        if($user->getUser('email')){
            Redirect::relocate('file');
        }
        $this->setHead('<link rel="stylesheet" href="'.HTTP_SERVER.'/views/templates/default/css/login.css" type="text/css" media="screen" />');
        $this->setTitle(P_NAME.'- Create Account');
        $this->loadView("register.tpl");
        
    }
    
    public function register(){
        if(isset($_POST['email'])){
            foreach($_POST as $key=>$value){
                if(strlen(trim($value))<1){
                    $this->assign('error', 'Please fill all fields');
                    $this->setHead('<link rel="stylesheet" href="'.HTTP_SERVER.'/views/templates/default/css/login.css" type="text/css" media="screen" />');
                    $this->setTitle(P_NAME.'- Please Fill all fields');
                    $this->loadView("register.tpl");
                } 
            }
                    $result1 = $this->loadModel('register');
                    $result = $result1->doRegister();
                    
                    if($result==='ALREADY_CONFIRMED') {
                        $this->assign('error', 'Sorry! You can only create one account.');
                        $this->index();
                        return true;
                    }
                    if($result==='NOT_CONFIRMED'){
                        $this->assign('error', 'Incorrect token or identification number');
                        $this->index();
                        return true;
                    }
                    
                    if($result===true) {
                        $this->assign('success', 'Registration Was successful');
                        $this->setHead('<link rel="stylesheet" href="'.HTTP_SERVER.'/views/templates/default/css/login.css" type="text/css" media="screen" />');
                        $this->setTitle(P_NAME.'- Registration Was Successful');
                        $this->loadView("register.tpl");                       
                        
                    } else {
                        $this->assign('error', 'Oops! This Email address is already registered with us');
                    $this->setHead('<link rel="stylesheet" href="'.HTTP_SERVER.'/views/templates/default/css/login.css" type="text/css" media="screen" />');
                    $this->setTitle(P_NAME.'- This Email address is already registered with us');
                    $this->loadView("register.tpl");
                        
                    }
                    
                        
                    
                    
                }
            }
            
            public function generateIDs(){
                $reg = $this->loadModel('register')->generateIDs();
                if($reg === true){
                    die("Complete");
                }
            }
        }
        
    

