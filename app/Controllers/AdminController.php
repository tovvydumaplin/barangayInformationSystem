<?php
namespace App\Controllers;
use App\Models\UserModel; 
class AdminController extends BaseController
{
    public function dashboard()
    {
        return view('admin/dashboard'); 
    }

    public function communityRecords()
    {
        return view('admin/community-records'); 
    }

    public function lendingAssets()
    {
        return view('admin/lending-assets'); 
    }
    public function events()
    {
        return view('admin/events'); 
    }
    public function services()
    {
        return view('admin/services'); 
    }
    public function officials()
    {
        return view('admin/officials'); 
    }
    public function incidentReports()
    {
        return view('admin/incident-report'); 
    }
    public function manageUsers()
    {
        return view('admin/users'); 
    }
    public function accountSettings()
    {
        return view('admin/account'); 
    }
    public function getUsers()
    {
        $model = new UserModel();
        $users = $model->findAll();
    
        $data = [];
        foreach ($users as $user) {
            $profile_image = !empty($user['image']) 
                ? base_url($user['image'])  
                : base_url('uploads/default-profile.png');
    
            $data[] = [
                "account_id" => $user['account_id'],
                "token" => $user['token'], 
                "full_name" => $user['firstname'] . ' ' . $user['lastname'],
                "username" => $user['username'], 
                "role" => $user['role'],
                "status" => $user['status'] == 1 
                    ? '<span class="text-success">Active</span>' 
                    : '<span class="text-danger">Inactive</span>',
                "profile_image" => $profile_image,
                "action" => '<button class="btn__primary table__button viewUserBtn" data-token="'.$user['token'].'">View</button>'
            ];
        }
    
        return $this->response->setJSON(["data" => $data]);
    }
    
    
    
    
    public function getUser()
    {
        $token = $this->request->getGet("token"); 
        
        if (!$token) {
            return $this->response->setJSON(["success" => false, "message" => "Missing user token"]);
        }
    
        $model = new UserModel();
        $user = $model->where("token", $token)->first(); 
    
        if ($user) {
            return $this->response->setJSON([
                "success" => true,
                "data" => [
                    "account_id"  => $user["account_id"],  
                    "token"       => $user["token"],       
                    "firstname"   => $user["firstname"],
                    "lastname"    => $user["lastname"],
                    "middlename"  => $user["middlename"],
                    "suffix"      => $user["suffix"],
                    "position"    => $user["position"],
                    "role"        => $user["role"],
                    "username"    => $user["username"], 
                    "image"       => base_url($user["image"] ?: "uploads/default-profile.png")
                ]
            ]);
        } else {
            return $this->response->setJSON(["success" => false, "message" => "User not found"]);
        }
    }
    
    
public function updateUser()
{
    $token = $this->request->getPost('token');
    
    if (empty($token)) {
        return $this->response->setJSON(['success' => false, 'message' => 'Token is missing']);
    }

    $data = [
        'firstname'  => $this->request->getPost('firstname'),
        'lastname'   => $this->request->getPost('lastname'),
        'middlename' => $this->request->getPost('middlename'),
        'suffix'     => $this->request->getPost('suffix'),
        'position'   => $this->request->getPost('position'),
        'role'       => $this->request->getPost('role'),
        'email'      => $this->request->getPost('email'),
        'updated_at' => date('Y-m-d H:i:s') 
    ];

    // Handle image upload
    $file = $this->request->getFile('view_profile_image');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName(); // Generate unique name
        $file->move('uploads/', $newName); // Move to uploads folder
        $data['image'] = 'uploads/' . $newName; // Save path in DB
    }

    $userModel = new UserModel();
    $update = $userModel->where('token', $token)->set($data)->update();

    if ($update) {
        return $this->response->setJSON(['success' => true, 'message' => 'User updated successfully', 'image_url' => base_url($data['profile_image'] ?? '') // ✅ Corrected key
]);
    } else {
        return $this->response->setJSON(['success' => false, 'message' => 'Failed to update user']);
    }
}

    
    
    
    public function createUser() 
    {
        $validation = \Config\Services::validation();
        $session = session();
        $model = new UserModel();
    
        $file = $this->request->getFile('profile_image');
        if (!$file) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No file uploaded.'
            ]);
        }
    
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/', $newName);
    
            $imagePath = 'uploads/' . $newName;
        } else {
            $imagePath = null;
        }
    
        if (!$imagePath) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Please select an image.'
            ]);
        }
    
        $validationRules = [
            'email'    => 'required|valid_email|is_unique[tbl_account.username]', 
            'password' => 'required|min_length[4]',
            'role'     => 'required|in_list[user,administrator]'
        ];
    
        if (!$this->validate($validationRules)) {
            return $this->response->setJSON([
                'status' => 'validation_error',
                'errors' => $validation->getErrors()
            ]);
        }
    
        // Hash password
        $hashedPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    
        // Data to save
        $data = [
            'username'   => $this->request->getPost('email'), 
            'firstname'  => $this->request->getPost('firstname'),
            'middlename' => $this->request->getPost('middlename'),
            'lastname'   => $this->request->getPost('lastname'),
            'position'   => $this->request->getPost('position'),
            'suffix'     => $this->request->getPost('suffix'),
            'password'   => $hashedPassword,
            'role'       => $this->request->getPost('role'),
            'status'     => 1,
            'token'      => bin2hex(random_bytes(32)),
            'image'      => $imagePath, 
        ];
    
        if ($model->insert($data)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'User Created Successfully!'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to create user.'
            ]);
        }
    }
    
}
