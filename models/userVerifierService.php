<?php

/*
 * Copyright (C) 2015 mathieu
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
 * Description of userVerifierService
 *
 * @author Eletta Adeola
 */

define('CONFIRMED','CONFIRMED');
define('ALREADY_CONFIRMED', 'ALREADY_CONFIRMED');
define('NOT_CONFIRMED', 'NOT_CONFIRMED');


class UserVerifierService extends Model {
    protected $db;
    public function __construct() {
        parent::__construct();
        $this->db = $this->doQuery();
    }
    
    public function confirmUser($data){
        $ident_no = $data['identification_no'];
        $token =  $data['token'];
        
        $q = $this->db->prepare("SELECT * FROM user_service_verifier WHERE identification_no=:ident_no AND token=:token");
        $q->bindParam(':ident_no',$ident_no);
        $q->bindParam(':token', $token);
        $q->execute();
        if($q->rowCount() > 0) {
            $result = $q->fetchAll()[0];
             
            if(!$this->hasBeenRegistered($result['id'])){
                $this->changeRegisterStatus($result['id']);
                
                return CONFIRMED;
            } else{
                return ALREADY_CONFIRMED;
            }
        }
        return NOT_CONFIRMED;
        
    }
    
    public function hasBeenRegistered($dataid){
        $q = $this->db->prepare("SELECT has_been_registered FROM user_service_verifier WHERE id=:dataid");
        $q->bindParam(':dataid',$dataid);
        $q->execute();
         
        if($q->fetchAll()[0]['has_been_registered'] === 'no'){
            return FALSE;
        } else{
            return TRUE;
        } 
        
    }
    
    public function changeRegisterStatus($id){
        $q = $this->db->prepare("UPDATE user_service_verifier SET has_been_registered='yes' WHERE id=$id");
        $q->execute();
        
        return TRUE;
       }
}
