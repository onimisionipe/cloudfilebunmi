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
 * Description of CFactory
 *
 * @authors Adeola Eletta - cuteangel1281@gmail.com; Matt Onipe - onimisionipe@gmail.com
 * @version
 * 
 * 
 */

/**
 * main factory class
 */
class CFactory {
    public static function getSession(){
        return new Session();
    }
    
    public static function getUser(){
        if(self::getSession()->checkSession('expire')==false){
            return new User();          
        } elseif(self::getSession()->checkSession('expire')==true){
            if((time()-self::getSession()->getSession('expire'))>EXPIRE){
                self::getSession()->destroySession();
                Redirect::relocateHome();
            } else {
                self::getSession()->setSession('expire',time());
                return new User();
            }
            
        }
        
    }
    
    public static function getRequest(){
        return new RequestWrapper();
    }
}
