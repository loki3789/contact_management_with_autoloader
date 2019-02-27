<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '..\..\vendor\autoload.php';

class TestDatabase extends PHPUnit_Framework_TestCase
{
    public function testGetConnectionMethod()
    {
        $data=new Database;
        $pdoObject=$data->getConnection();
        $this->assertSame("object", gettype($pdoObject));
    }
    
    public function testUpdateMethod()
    {
        $data=new Database;
        $pdoObject=$data->getConnection();
        
        $arrayOfData=array('id'=>32,'name'=>'abc','email'=>'lo@gmail.com','phonenumber'=>'123','birthdate'=>'12/12/2019');
        
        $result=$data->update($pdoObject,'contacts',$arrayOfData);
        $this->assertTrue($result);
    }
    
    public function testAddMethod()
    {
        $data=new Database;
        $pdoObject=$data->getConnection();
        
        $arrayOfData=array('name'=>'abc','email'=>'lo@gmail.com','phonenumber'=>'123','birthdate'=>'12/12/2019');
        
        $result=$data->add($pdoObject,'contacts',$arrayOfData);
        $this->assertTrue($result);
    }
    
    public function testDeleteMethod()
    {
        $data=new Database;
        $pdoObject=$data->getConnection();
        
        $id=33;
        $result=$data->delete($pdoObject,'contacts',$id);
        $this->assertTrue($result);
    }
    public function testGetAllContactsMethod()
    {
        $data=new Database;
        $pdoObject=$data->getConnection();
        
        
        $result=$data->all($pdoObject,'contacts');
       
        $this->assertSame("object", gettype($result));
    }
    
    public function testGetDataByNameMethod()
    {
        $data=new Database;
        $pdoObject=$data->getConnection();
        
        
        $result=$data->getDataBy($pdoObject,'contacts','abc');
       
        $this->assertSame("object", gettype($result));
    }
}
