<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContactLens_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct('ContactLens', 'ProductId');
    }

    public function deleteContactLens($id, $productId)
    {
        $sql = "DELETE FROM Products P
        INNER JOIN ContactLens C
        ON P.Id = C.ProductId
        WHERE P.Id = $id AND C.ProductId = $productId";

        $this->db->query($sql);

        return (object) array(
            'affectedRows' => $this->db->affected_rows(),
            'error' => $this->db->error(),
        );
    }
}
