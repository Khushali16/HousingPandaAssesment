<?php

namespace App\Controllers;

use App\Models\PropertyModel;
class Home extends BaseController
{
    public function insertPropertyDetails()
    {
        $method = $this->request->getMethod();
        if ($method == 'POST') {
            $db = db_connect();
            $model = new PropertyModel($db);
            $post_data = $this->request->getPost();
            $data = $model->insertPropertyDetails($post_data);
            if ($data) {
                $randomValue = rand(0, 1) == 1 ? 'listingsUser' : 'listingsAdmin';
                return redirect()->to(base_url('/' . $randomValue));
            } else {
                $message = 'Failed to add listing';
                return view('insert_property_details', ['message' => $message]);
            }
        }
        if ($method == 'GET') {
            return view('insert_property_details');   
        }
    }
    public function showListingsAdmin()
    {
        $db = db_connect();
        $model = new PropertyModel($db);
        $data = $model->getListings();
        $role = 'admin';
        return view('listings', ['data' => $data, 'role' => $role]);
    }
    public function showListingsUser()
    {
        $db = db_connect();
        $model = new PropertyModel($db);
        $data = $model->getListings();
        $role = 'user';
        return view('listings', ['data' => $data, 'role' => $role]);
    }
    public function update()
    {
        $db = db_connect();
        $model = new PropertyModel($db);
        $post_data = $this->request->getPost();
        $data = $model->updatePropertyDetails($post_data);
        if ($data) {
            return json_encode(['status' => 'success', 'message' => 'Listing updated successfully']);
        } else {
            return json_encode(['status' => 'error', 'message' => 'Failed to update listing']);
        }
    }
    public function delete_property($id)
    {
        $db = db_connect();
        $model = new PropertyModel($db);
        $data = $model->delete_property($id);
        if ($data) {
            return json_encode(['status' => 'success', 'message' => 'Listing deleted successfully']);
        } else {
            return json_encode(['status' => 'error', 'message' => 'Failed to delete listing']);
        }
    }
}
