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
 * Description of shareModel
 *
 * @author Adeola Eletta
 */
class shareModel extends model{
    
    public function index(){
        $listoffiles = array();
        $sharedFiles = $this->doQuery();
        $userid = CFactory::getUser()->getUser('user_id');
        
        $stmt = $sharedFiles->prepare("SELECT * FROM shares WHERE user_id=:userid");
        $stmt->bindParam(':userid', $userid);
        $stmt->execute();
        
        if($stmt->rowCount()>0){
            $files = $stmt->fetchAll();
            foreach($files as $fi){
                $listoffiles[]=array("name"=>$fi['file_name'], "date_shared"=>$fi['date_shared'],"download_count"=>$fi['download_count'], "file_id"=>$fi['share_id'], "ext"=> pathinfo($fi['file_path'],PATHINFO_EXTENSION), "size"=>  filesize($fi['file_path']), "cssclass"=>  rand(1, 5), "download_count"=>$fi['download_count']);
            }
            return $listoffiles;
        } else {
                        
            return false;
        }
        
    }
    
    public function share($filetoshare){
        $userid = CFactory::getUser()->getUser('user_id');
        $q = $this->doQuery();
        
        //check if file has been shared already
        $stmt = $q->prepare("SELECT * FROM shares WHERE user_id=:userid AND file_name=:filename");
        $stmt->bindParam('userid',$userid);
        $stmt->bindParam('filename',$filetoshare);
        $stmt->execute();
        
        if($stmt->rowCount()>0) {
            return "Looks like the file you selected has already been shared";
        } else{
            //check if file exist
            if(!file_exists(CFactory::getSession()->getSession('cur_path').DS.$filetoshare)){
                return "Looks like the file you are trying to share does not actually exist";
            }
        }
        
        //now share file..  
        $q2 = $this->doQuery();
        $stmt2 = $q2->prepare("INSERT INTO shares (user_id, file_name, file_path, date_shared) VALUES (:userid, :file_name, :file_path, NOW())");
        $stmt2->execute(array(':userid'=>$userid, ':file_name'=>$filetoshare, ':file_path'=>  CFactory::getSession()->getSession('cur_path').DS.$filetoshare));
        
        return true;
    }
    
    public function unshare($filetounshare){
        $userid = CFactory::getUser()->getUser('user_id');
        $q = $this->doQuery();
        
        //check if file has been shared already
        $stmt = $q->prepare("DELETE FROM shares WHERE user_id=:userid AND file_name=:filename");
        $stmt->bindParam('userid',$userid);
        $stmt->bindParam('filename',$filetounshare);
        $stmt->execute();
         return true;
        
    }
    
}
