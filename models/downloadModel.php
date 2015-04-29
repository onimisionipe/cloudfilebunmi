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
 * Description of downloadModel
 *
 * @author 
 */
class downloadModel extends Model {
   
    public function verify($fileid){
        $q = $this->doQuery();
        
        $stmt = $q->prepare("SELECT shares.*, users.fullname FROM shares, users WHERE shares.user_id=users.user_id AND shares.share_id=:fileid");
        $stmt->bindParam(":fileid", $fileid);
        $stmt->execute();
        
        if($stmt->rowCount()>0){
            $result = $stmt->fetchAll();
            foreach($result as $res){
                $arr = array("name"=>$res['file_name'], "ext"=>pathinfo($res['file_path'], PATHINFO_EXTENSION), "size"=>filesize($res['file_path']), "date_shared"=>$res['date_shared'],"link"=>$res['share_id'], "shared_by"=>$res['fullname'], "download_count"=>$res['download_count']);
            }
           return $arr;
        } else {
            return false;
        }
        
    }
    
    public function trueDownload($fileid){
        $q = $this->doQuery();
        
        $stmt = $q->prepare("SELECT * FROM shares WHERE share_id=:fileid");
        $stmt->bindParam(":fileid", $fileid);
        $stmt->execute();
       
        if($stmt->rowCount()>0){
            $res = $stmt->fetchAll();
          $file = $res[0]['file_path'];
          $filename = basename($file);
          //increment downloadcount before sending users file
          
          $q2 = $this->doQuery();
          $stmt = $q->prepare("UPDATE shares SET download_count=download_count+1 WHERE share_id=:fileid");
          $stmt->bindParam(":fileid", $fileid);
          $stmt->execute();
          
            header("Content-type: application/octet-stream");
            header("Content-length: ".filesize($file));
            header("Pragma: no-cache");
            header("Expires: 0");
            header("Content-disposition: attachment; filename=$filename");
            
            $fp = fopen($file,"r");
            print fread($fp, filesize($file));
            fclose($fp);
          
    }
    }
}
