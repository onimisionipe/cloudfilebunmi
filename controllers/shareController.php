<?php

/*
 * Copyright (C) 2014 HP
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
 * Description of shareController
 *
 * @author Adeola Eletta
 */
class shareController extends Controller {
    
    public function index(){
         $user = CFactory::getUser();
        if(!$user->getUser('email')){
            Redirect::relocate('index');
        }
        
        $this->setTitle(P_NAME.'- Share Files');
        $this->assign('logout', 'Logout');
            $this->assign('logoutlink', HTTP_SERVER.'/logout');
            $this->assign('filemgr', HTTP_SERVER.'/file');
            $this->assign('filelink', 'My Files');
            $this->assign('headshare', 'Share');
            $this->assign('sharelink', HTTP_SERVER.'/share');             
            $this->assign('welcome', 'Hi! '. $user->getUser('fullname'));
            $this->setTitle('Hey '. $user->getUser('fullname').' - '.'Share Files');
            $this->setHead('<link rel="stylesheet" href="'.HTTP_SERVER.'/views/templates/default/css/share.css" type="text/css" media="screen" />');
            $this->setNav(ROOT.DS.'views'.DS.'templates'.DS.TEMPLATE.DS.'nav-home.tpl');
            
            $this->assign('SESSION', CFactory::getUser()->getSessionId());
            
            //call model to get shared files by user
            $share = $this->loadModel('share')->index();
            if($share !== false){
                
                $this->assign('share', $share);
            } else {
                
                $this->assign('nofiles', 'No file(s) has been shared');
            }
            
            $this->loadView('share.tpl');
    }
    
    public function share($filetoshare){
         $user = CFactory::getUser();
        if(!$user->getUser('email')){
            Redirect::relocate('index');
        }
        $share = $this->loadModel('share')->share($filetoshare);
        if($share === true){
            Redirect::relocate('share/index/');
        } else {
            Redirect::relocate('file/index/'.$share);
        }
        
        
    }
    
    public function unshare($filetounshare){
      $user = CFactory::getUser();
        if(!$user->getUser('email')){
            Redirect::relocate('index');
        }
        $unshare = $this->loadModel('share')->unshare($filetounshare);
        if($unshare === true){
            $this->index();
            
            
        } else {
            Redirect::relocate('file/index/'.$unshare);
        }
        
    }
    
}
