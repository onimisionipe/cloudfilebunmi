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
 * Description of downloadController
 *
 * @author Bunmi
 */
class downloadController extends Controller{
    
    public function file($fileid){
        $this->setTitle(P_NAME.'- Download File');
        
        $this->setHead('<link rel="stylesheet" href="'.HTTP_SERVER.'/views/templates/default/css/download.css" type="text/css" media="screen" />');
        
            
        
        
        $validfile = $this->loadModel('download')->verify($fileid);
        if($validfile===false){
           $this->assign('error', "The file you requested for does not exist. Or the link might be broken. please contact the source of the link.");             
        } else {
            $this->assign('dload', $validfile);
        }
        
        $this->loadView('download.tpl');
    }
    
    public function truedownload($fileid){
        $download = $this->loadModel('download')->trueDownload($fileid);
        if(download===false){
            Redirect::relocateHome();
        }
    }
}
