<?php
    

class LibrarianPanel extends CI_Model
{
    function get_inactives()
    {
        $query = $this->db->query("
        SELECT COUNT(material_id)
        AS inactive_books
        FROM materials
        WHERE status=0;
        ");

        return $query->result_array();
    }

    function get_inactive_list()
    {
        require('../ucsc-digital-library/application/libraries/Material.php');

        $query = $this->db->query("
        SELECT *
        FROM materials
        WHERE status=0
        ");
        
        $books = $query->result_array();
        $booklist = array();
        $i=0;
        foreach($books as $book)
        {
             $name       =$book['name'];
             $author     =$book['author'];
             $uploader_id=$book['uploader_id'];
             $date       =$book['upload_date'];
             $path       =$book['path'];
             $status     =$book['status'];

             $material       = new Material($name,$author,$uploader_id,$date,$path,$status);
             $material->set_id($book['material_id']);
             $booklist[$i]=$material;
             $i++;  
        }
        
        return $booklist;
    }

    function activate_book($id)
    {
        $query = $this->db->query("
        UPDATE materials
        SET status=1
        WHERE material_id=$id;
        ");

        return $query;
    }
}

?>


