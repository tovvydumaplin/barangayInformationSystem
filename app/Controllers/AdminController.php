<?php
namespace App\Controllers;
use App\Models\UserModel; 
use App\Models\EventModel; 
use App\Models\ResidentModel; 
use App\Models\HouseModel; 

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
                    : '<span class="text-inactive">Inactive</span>',
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
                    "status"      => $user["status"],
                    "image"       => base_url($user["image"] ?: "uploads/default-profile.png")
                ]
            ]);
        } else {
            return $this->response->setJSON(["success" => false, "message" => "User not found"]);
        }
    }
    
    public function deactivateUser() 
    {
        $status = $this->request->getPost('status');
        $token = $this->request->getPost('token');
    
        $userModel = new UserModel();
        $update = $userModel->where('token', $token)->set('status', $status)->update();
        if ($update) {
            return $this->response->setStatusCode(200)->setJSON(['success' => true, 'message' => 'Account Deactivated!']);
        } else {
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Failed to update user status']);
        }
    }
    public function reactivateUser() 
    {
        $status = $this->request->getPost('status');
        $token = $this->request->getPost('token');
    
        $userModel = new UserModel();
        $update = $userModel->where('token', $token)->set('status', $status)->update();
        if ($update) {
            return $this->response->setStatusCode(200)->setJSON(['success' => true, 'message' => 'Account Reactivated!']);
        } else {
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Failed to update user status']);
        }
    }

    public function archiveResident() {
        $residentIdData = $this->request->getPost('residentIdData');
        $status = 0;

        $residentModel = new residentModel();
        $update = $residentModel->where('resident_id', $residentIdData)->set('status', $status)->update();

        if ($update) {
            return $this->response->setStatusCode(200)->setJSON(['success' => true, 'message' => 'Resident Deactivated']);
        } else {
            return $this->response->setStatusCode(500)->setJSON(['error'=>'Failed to update resident status']);
        }

    }
    
    public function reactivateResident() {
        $resIdData = $this->request->getPost('resIdData');
        $status = 1;

        $residentModel = new residentModel();
        $update = $residentModel->where('resident_id', $resIdData)->set('status', $status)->update();
        
        if ($update) {
            return $this->response->setStatusCode(200)->setJSON(['success' => true, 'message' => 'Resident Reactivated!']);
        } else {
            return $this->response->setStatusCode(500)->setJSON(['error'=>'Failed to update resident status']);
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

    // Define the upload path
    $uploadPath = FCPATH . 'uploads/';

    // Ensure the uploads directory exists
    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true); 
    }

    $file = $this->request->getFile('profile_image');
    if (!$file) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'No file uploaded.'
        ]);
    }

    if ($file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move($uploadPath, $newName);

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

    
    public function createEvent() 
    {
        $request = $this->request->getPost();

        $eventModel = new EventModel();
        $eventData = [
            'event_title'       => $request['event_title'],
            'event_description' => $request['event_description'],
            'start_date'        => $request['date_start'],
            'end_date'          => $request['date_end'],
            'status'            => 1
        ];

        if ($eventModel->insert($eventData)) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to save event.']);
        }
    }

    public function deactivateEvent()
    {
        $status = $this->request->getPost('status');
        $id = $this->request->getPost('id');
    
        $eventModel = new EventModel();
        $update = $eventModel->where('event_id', $id)->set('status', $status)->update();
        if ($update) {
            return $this->response->setStatusCode(200)->setJSON(['success' => true, 'message' => 'Event Deactivated!']);
        } else {
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Failed to update user status']);
        }

    }

    public function viewEvents()
    {
        $status = $this->request->getGet('status');
        $eventModel = new EventModel();
        $events = $eventModel->where('status', $status)->findAll();

        if ($events) {
            return $this->response->setJSON([
                'success' => true,
                'data'    => $events
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'No events found.'
            ]);
        }
    }

    public function viewEventDetails()
    {
        $eventId = $this->request->getGet('event_id'); // Get the event ID from AJAX request

        if (!$eventId) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid event ID.',
            ]);
        }

        $eventModel = new EventModel(); // Load the model
        $event = $eventModel->where('event_id', $eventId)->first();

        if (!$event) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Event not found.',
            ]);
        }

        return $this->response->setJSON([
            'success' => true,
            'data' => $event,
        ]);
    }
    public function updateEventDetails()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request method']);
        }
    
        $eventModel = new EventModel();
        $eventId = trim($this->request->getPost('event_id'));
        
        if (empty($eventId)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Event ID is required']);
        }

        $data = [
            'event_title'       => trim($this->request->getPost('event_title')),
            'event_description' => trim($this->request->getPost('event_description')),
            'start_date'        => trim($this->request->getPost('start_date')),
            'end_date'          => trim($this->request->getPost('end_date'))
        ];
    
        // Remove empty values
        $data = array_filter($data);
    
        if (empty($data)) {
            return $this->response->setJSON(['success' => false, 'message' => 'No changes detected']);
        }
    
        if ($eventModel->update($eventId, $data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Event updated successfully']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update event']);
        }
    }

    public function createResident()
    {
        if ($this->request->isAJAX()) {
            $data = $this->request->getPost('members'); // Get the array of members
    
            log_message('debug', 'Received Data: ' . print_r($data, true));
    
            if (empty($data) || !is_array($data)) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'No valid data received.'
                ]);
            }
    
            $residentModel = new ResidentModel();
    
            // Insert all members at once
            if ($residentModel->insertBatch($data)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Residents created successfully!'
                ]);
            }
    
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to create residents.'
            ]);
        }
    }
    
    public function loadResidents()
    {
        $residentModel = new ResidentModel();

        $residents = $residentModel->where('status', '1')->findAll();

        return $this->response->setJSON([
            'success' => count($residents) > 0,
            'data' => $residents
        ]);
    }
    public function getArchivedResidents() {
        $residentModel = new ResidentModel();
        $residents = $residentModel->where('status', '0')->findAll();

        return $this->response->setJSON(['success' => count($residents) > 0, 'data'=>$residents]);
    }

    public function getResidentDetails()
    {
        $residentModel = new ResidentModel();
        $residentId = $this->request->getGet('resident_id');
    
        if (!$residentId) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Resident ID is required'
            ]);
        }
    
        $resident = $residentModel->where('resident_id', $residentId)->first();
    
        if ($resident) {
            return $this->response->setJSON([
                'success' => true,
                'data' => $resident
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Resident not found'
            ]);
        }
    }

    public function createPin()
    {
        $request = $this->request->getPost();
    
        $houseModel = new HouseModel(); // Use HouseDetails model
        $pinData = [
            'house_no'  => $request['house_number'],
            'house_street'  => $request['house_street'], 
            'type'      => $request['type'],
            'latitude'  => $request['latitude'],
            'longitude' => $request['longitude'],
            'status'    => 1
        ];
    
        try {
            if ($houseModel->insert($pinData)) {
                return $this->response->setJSON(['success' => true]);
            }
        } catch (\Exception $e) {
            // Check if the error is due to duplicate entry
            if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Unique house number is enforced! A house with this number and status already exists.'
                ]);
            }
    
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to save pin.'
            ]);
        }
    }
    
    
    public function getHouseDetails()
    {
        $db = db_connect();
    
        $query = $db->query("
            SELECT 
                h.house_no,
                h.house_street,
                h.latitude,
                h.longitude,
                h.type,
                r.firstname,
                r.middlename,
                r.lastname,
                r.is_family_head,
                r.resident_id
            FROM tbl_house h
            LEFT JOIN tbl_residents r ON h.house_no = r.house_no
            WHERE h.status = 1
        ");
    
        $houses = [];
        foreach ($query->getResultArray() as $row) {
            $house_no = $row['house_no'];
    
            if (!isset($houses[$house_no])) {
                $houses[$house_no] = [
                    'house_no' => $house_no,
                    'house_street' => $row['house_street'],
                    'latitude' => $row['latitude'],
                    'longitude' => $row['longitude'],
                    'type' => $row['type'],
                    'residents' => [],
                ];
            }
    
            if (!empty($row['firstname'])) {
                $houses[$house_no]['residents'][] = [
                    'fullname' => $row['firstname'] . " " . substr($row['middlename'], 0, 1) . ". " . $row['lastname'],
                    'is_family_head' => $row['is_family_head'],
                    'resident_id' => $row['resident_id'],
                ];
            }
        }
    
        return $this->response->setJSON(array_values($houses));
    }
    
    public function getHouseNumbers()
    {
        $houseModel = new HouseModel(); 
        $houseNumbers = $houseModel->select('house_no')->findAll();

        if (!empty($houseNumbers)) {
            return $this->response->setJSON([
                'success' => true,
                'data' => $houseNumbers
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'No house numbers found.'
        ]);
    }
    public function getHouseStreet()
    {
        $houseNumber = $this->request->getGet('house_number');

        if (!$houseNumber) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'House number is required'
            ]);
        }
        $houseModel = new HouseModel();
        $house = $houseModel->where('house_no',$houseNumber)->first();

        if($house) {
            return $this->response->setJSON([
                'success' => true,
                'data' => ['house_street' => $house['house_street']]
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => "No street found for this house number"
            ]);
        }
    }

    public function removeResidentInHouse()
    {
        $residentId = $this->request->getPost('resident_id');
        $houseNo = $this->request->getPost('house_no'); // Should be 0

        if (!$residentId) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid resident ID']);
        }

        $residentModel = new ResidentModel();
        $updated = $residentModel->update($residentId, ['house_no' => $houseNo]);

        if ($updated) {
            return $this->response->setJSON(['success' => true, 'message' => 'House number updated']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update house number']);
        }
    }

    public function updateHouseLocation()
    {
        $oldHouseNumber = $this->request->getPost('old_house_number'); // Previous house number
        $newHouseNumber = $this->request->getPost('house_number'); // New house number
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');
    
        if (!$oldHouseNumber || !$newHouseNumber || !$latitude || !$longitude) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid data.']);
        }
    
        $houseModel = new HouseModel();
    
        // Ensure we update both house_no and coordinates
        $updateData = [
            'house_no' => $newHouseNumber,
            'latitude' => $latitude,
            'longitude' => $longitude
        ];
    
        // Update the correct record based on the old house number
        $update = $houseModel->where('house_no', $oldHouseNumber)->set($updateData)->update();
    
        if ($update) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'House location updated successfully!',
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Update failed. Please check your database.',
            ]);
        }
    }
    
    
    


}

