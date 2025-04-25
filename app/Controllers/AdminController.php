<?php
namespace App\Controllers;
use App\Models\UserModel; 
use App\Models\EventModel; 
use App\Models\ResidentModel; 
use App\Models\HouseModel; 
use App\Models\InventoryModel;
use App\Models\InventoryHistoryModel;
use App\Models\LendingModel;
use App\Models\OfficialModel;
use App\Models\ComplainModel;
use App\Models\SuffixModel;
use App\Models\PositionModel;
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
        $session = session();
    
        $imagePath = $session->get('image') 
            ? base_url($session->get('image')) 
            : base_url('assets/images/img__default.png');
    
        $data = [
            'firstname'  => $session->get('firstname'),
            'lastname'   => $session->get('lastname'),
            'middlename' => $session->get('middlename'),
            'suffix'     => $session->get('suffix'),
            'username'   => $session->get('username'),
            'role'       => $session->get('role'),
            'image'      => $imagePath, 
        ];
    
        return view('admin/account', $data);
    }

    public function settings()
    {
        return view('admin/settings'); 
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
        'username'      => $this->request->getPost('email'),
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
            'status'            => 0
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
    public function approveEvent()
    {
        $status = $this->request->getPost('status');
        $id = $this->request->getPost('id');
    
        $eventModel = new EventModel();
        $update = $eventModel->where('event_id', $id)->set('status', $status)->update();
        if ($update) {
            return $this->response->setStatusCode(200)->setJSON(['success' => true, 'message' => 'Event Reactivated!']);
        } else {
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Failed to update user status']);
        }

    }
    public function disapproveEvent()
    {
        $status = $this->request->getPost('status');
        $id = $this->request->getPost('id');
    
        $eventModel = new EventModel();
        $update = $eventModel->where('event_id', $id)->set('status', $status)->update();
        if ($update) {
            return $this->response->setStatusCode(200)->setJSON(['success' => true, 'message' => 'Event Reactivated!']);
        } else {
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Failed to update user status']);
        }

    }
    public function reactivateEvent()
    {
        $status = $this->request->getPost('status');
        $id = $this->request->getPost('id');
    
        $eventModel = new EventModel();
        $update = $eventModel->where('event_id', $id)->set('status', $status)->update();
        if ($update) {
            return $this->response->setStatusCode(200)->setJSON(['success' => true, 'message' => 'Event Reactivated!']);
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
            $data = $this->request->getPost('members');
    
            log_message('debug', 'Received Data: ' . print_r($data, true));
    
            if (empty($data) || !is_array($data)) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'No valid data received.'
                ]);
            }
    
            $residentModel = new ResidentModel();
    
            // Check if any of the incoming members is a family head
            foreach ($data as $member) {
                if (isset($member['is_family_head']) && $member['is_family_head'] == 1) {
                    // Check if house_no already has a family head
                    $existingHead = $residentModel
                        ->where('house_no', $member['house_no'])
                        ->where('is_family_head', 1)
                        ->first();
    
                    if ($existingHead) {
                        return $this->response->setJSON([
                            'status' => 'error',
                            'message' => 'This household already has a family head.'
                        ]);
                    }
                }
            }
    
            // Insert all members
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
    public function filterResidents()
    {
        $residentModel = new ResidentModel();
        $filter = $this->request->getGet('filter');
    
        // Default: show only active residents unless filtering for 'Archived'
        if ($filter !== 'Archived') {
            $residentModel->where('status', '1');
        }
    
        if (!empty($filter)) {
            switch ($filter) {
                case 'Male':
                case 'Female':
                    $residentModel->where('gender', $filter);
                    break;
    
                case 'Single':
                case 'Married':
                case 'Divorced':
                    $residentModel->where('civil_status', $filter);
                    break;
    
                case 'Head':
                    $residentModel->where('is_family_head', 1);
                    break;
    
                case 'NonHead':
                    $residentModel->where('is_family_head', 0);
                    break;
    
                case 'Voter':
                    $residentModel->where('is_voter_of_barangay', 1);
                    break;
    
                case 'NonVoter':
                    $residentModel->where('is_voter_of_barangay', 0);
                    break;
    
                case 'Senior':
                    // Get current date minus 60 years
                    $cutoff = date('Y-m-d', strtotime('-60 years'));
                    $residentModel->where('birthdate <=', $cutoff);
                    break;
    
                case 'Minor':
                    // Get current date minus 18 years
                    $cutoff = date('Y-m-d', strtotime('-18 years'));
                    $residentModel->where('birthdate >', $cutoff);
                    break;
    
                case 'ByFamily':
                    // Fetch and group manually after
                    $residents = $residentModel
                        ->select('*')
                        ->where('status', '1')
                        ->findAll();
    
                    $grouped = [];
                    foreach ($residents as $resident) {
                        $houseNo = $resident['house_no'] ?? 'N/A';
                        if (!isset($grouped[$houseNo])) {
                            $grouped[$houseNo] = $resident;
                        }
                    }
    
                    return $this->response->setJSON([
                        'success' => count($grouped) > 0,
                        'data' => array_values($grouped)
                    ]);
    
                case 'Archived':
                    $residentModel->where('status', '0');
                    break;
    
                case 'PWD':
                    $residentModel->where('is_pwd', 1);
                    break;
    
                case 'All':
                    // Don't apply any specific filter, just show active
                    $residentModel->where('status', '1');
                    break;
    
                default:
                    // Handle unexpected filters or custom future ones
                    break;
            }
        }
    
        $residents = $residentModel->findAll();
    
        return $this->response->setJSON([
            'success' => count($residents) > 0,
            'data' => $residents
        ]);
    }
    
    public function getComplaint($id)
    {
        // Directly instantiate the ComplainModel
        $complainModel = new ComplainModel();

        // Fetch the complaint data using the model
        $complaintData = $complainModel->find($id);  // `find()` is a shortcut for getting a record by its primary key

        if ($complaintData) {
            // Return the complaint data in JSON format
            return $this->response->setJSON(['data' => $complaintData]);
        } else {
            // Return a 404 error if the complaint is not found
            return $this->response->setStatusCode(404, 'Complaint Not Found');
        }
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


    public function updateResident()
    {
        $resident_id = $this->request->getPost('resident_id');
        $firstname = $this->request->getPost('firstname');
        $lastname = $this->request->getPost('lastname');
        $middlename = $this->request->getPost('middlename');
        $suffix = $this->request->getPost('suffix');
        $contact_no = $this->request->getPost('contact_no');
        $birthdate = $this->request->getPost('birthdate');
        $birthplace = $this->request->getPost('birthplace');
        $citizenship = $this->request->getPost('citizenship');
        $gender = $this->request->getPost('gender');
        $civil_status = $this->request->getPost('civil_status');
        $occupation = $this->request->getPost('occupation');
        $religion = $this->request->getPost('religion');
        $is_pwd = $this->request->getPost('is_pwd');
        $is_voter_of_barangay = $this->request->getPost('is_voter_of_barangay');
        $is_family_head = $this->request->getPost('is_family_head');
        $household_name = $this->request->getPost('household_name');
        $house_no = $this->request->getPost('house_no');
        $street = $this->request->getPost('street');
        $contact_name = $this->request->getPost('contact_name');
        $emergency_contact_no = $this->request->getPost('emergency_contanct_no');
        $contact_relationship = $this->request->getPost('contact_relationship');
    
        // Perform update logic, like querying your model and updating the database
        $residentModel = new ResidentModel();
    
        // Assuming you are updating a resident with the given ID
        $updateData = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'middlename' => $middlename,
            'suffix' => $suffix,
            'contact_no' => $contact_no,
            'birthdate' => $birthdate,
            'birthplace' => $birthplace,
            'citizenship' => $citizenship,
            'gender' => $gender,
            'civil_status' => $civil_status,
            'occupation' => $occupation,
            'religion' => $religion,
            'is_pwd' => $is_pwd,
            'is_voter_of_barangay' => $is_voter_of_barangay,
            'is_family_head' => $is_family_head,
            'household_name' => $household_name,
            'house_no' => $house_no,
            'street' => $street,
            'contact_name' => $contact_name,
            'emergency_contact_no' => $emergency_contact_no,
            'contact_relationship' => $contact_relationship,
        ];
    
        // Updating the resident in the database
        $residentModel->update($resident_id, $updateData);
    
        return $this->response->setJSON(['success' => true]);
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
            WHERE h.status = 1 AND (r.status = 1 OR r.status IS NULL)
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
    
    public function createItem()
    {
        $validation = \Config\Services::validation();
        $session = session();
        $model = new InventoryModel();
    
        $uploadPath = FCPATH . 'uploads/inventory/';
    
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true); // Create the folder if it doesn't exist
        }
    
        $file = $this->request->getFile('image');
        if (!$file) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No file uploaded.'
            ]);
        }
    
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move($uploadPath, $newName);
    
            $imagePath = $newName; // Store only the filename
        } else {
            $imagePath = null;
        }
    
        if (!$imagePath) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Please select an image.'
            ]);
        }
    
        $assetName = $this->request->getPost('item_name');
        $assetQuantity = $this->request->getPost('item_quantity');
        $itemDescription = $this->request->getPost('item_description');
    
        if (empty($assetName) || empty($assetQuantity)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Asset name and quantity are required.'
            ]);
        }
    
        $data = [
            'item_name' => $assetName,
            'item_quantity' => $assetQuantity,
            'item_description' => $itemDescription,
            'image' => $imagePath, 
            'status' => 1, 
        ];
    
        if ($model->insert($data)) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Item Created Successfully!',
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to create item.',
            ]);
        }
    }
    
    
    
    
    public function getInventoryData()
    {
        $inventoryModel = new InventoryModel();

        $items = $inventoryModel->where('status', 1)->findAll();

        return $this->response->setJSON($items);
    }
    public function lendItems()
    {
        $lendingModel = new LendingModel();
        $residentModel = new ResidentModel();
    
        // Fetch lending records and join with tbl_residents to get the full borrower name and house number
        $items = $lendingModel->select('tbl_lending.*, 
                                         tbl_residents.firstname, 
                                         tbl_residents.middlename, 
                                         tbl_residents.lastname, 
                                         tbl_residents.suffix, 
                                         tbl_residents.house_no')
                              ->join('tbl_residents', 'tbl_residents.resident_id = tbl_lending.borrower_id')
                              ->where('tbl_lending.status', 1)  
                              ->findAll();
    
        foreach ($items as &$item) {
            $item['borrower_name'] = $item['firstname'] . ' ' . $item['middlename'] . ' ' . $item['lastname'] . ' ' . $item['suffix'];
        }
    
        return $this->response->setJSON($items);  // Return as JSON response
    }
    
    
    

    
    public function getItemDetails()
    {
        $itemId = $this->request->getGet('item_id');  // Get item_id from the GET request

        if (!$itemId) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Item ID is required.'
            ]);
        }

        $model = new InventoryModel();

        // Fetch item by item_id
        $item = $model->find($itemId);

        if ($item) {
            return $this->response->setJSON([
                'status' => 'success',
                'data' => $item
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Item not found.'
            ]);
        }
    }

    public function loadInventoryHistory()
    {
        $model = new InventoryHistoryModel();
    
        $inventoryHistory = $model->orderBy('created_at', 'DESC')->findAll();
    
        return $this->response->setJSON($inventoryHistory);
    }
    

    public function updateItem()
    {
        $validation = \Config\Services::validation();
        $model = new InventoryModel();
        $historyModel = new InventoryHistoryModel(); // Load history model
    
        // Validate input data
        $validation->setRules([
            'view_asset_name' => 'required',
            'view_asset_quantity' => 'required|numeric|greater_than_equal_to[0]',
        ]);
    
        if (!$validation->run($this->request->getPost())) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $validation->getErrors()
            ]);
        }
    
        $itemId = $this->request->getPost('item_id');
        $itemName = $this->request->getPost('view_asset_name');
        $itemQuantity = $this->request->getPost('view_asset_quantity');
        $itemQuantityDesc = $this->request->getPost('view_asset_quantity_desc');
        $currentImage = $this->request->getPost('current_image');
        $type = $this->request->getPost('stock_in_out');
        $inOutQuantity = $this->request->getPost('view_asset_quantity_update');

    
        // Get current (old) item data
        $existingItem = $model->find($itemId);
        $oldQuantity = $existingItem['item_quantity'] ?? 0;
    
        log_message('debug', 'POST data: ' . json_encode($this->request->getPost()));
        log_message('debug', 'FILES data: ' . json_encode($this->request->getFiles()));
    
        // Prepare update data
        $data = [
            'item_name' => $itemName,
            'item_quantity' => $itemQuantity,
            'in_out_reason' => $itemQuantityDesc
        ];
    
        // Handle image upload
        $file = $this->request->getFile('viewFileInput');
        if (!$file || !$file->isValid()) {
            $file = $this->request->getFile('image_file');
        }
    
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $uploadPath = 'uploads/inventory/';
            $fullPath = FCPATH . $uploadPath;
    
            if (!is_dir($fullPath)) {
                mkdir($fullPath, 0777, true);
            }
    
            if ($file->move($fullPath, $newName)) {
                $data['image'] = $newName;
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'File upload failed: ' . $file->getErrorString()
                ]);
            }
        }
    
        try {
            if ($model->update($itemId, $data)) {
                // Save to history
                $historyData = [
                    'item_name'     => $itemName,
                    'type'          => $type,
                    'old_quantity'  => $oldQuantity,
                    'quantity'      => $inOutQuantity,
                    'new_quantity'      => $itemQuantity,
                    'updated_by'    => session()->get('firstname') . ' ' . session()->get('lastname'),
                    'in_out_reason' => $itemQuantityDesc,
                ];
                $historyModel->insert($historyData);
    
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Item updated and history recorded!'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Database update failed: ' . print_r($model->errors(), true)
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Update exception: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Exception: ' . $e->getMessage()
            ]);
        }
    }
    

    public function fetchResidents()
    {
        $residentModel = new ResidentModel();
    
        $residents = $residentModel
            ->select("resident_id, firstname, middlename, lastname, suffix, CONCAT_WS(' ', firstname, middlename, lastname, suffix) as fullname")
            ->where('status', 1)
            ->findAll();
    
        return $this->response->setJSON($residents);
    }
    
    
    
    public function fetchItems()
    {
        $itemModel = new InventoryModel();
        $items = $itemModel->select('item_id, item_name, item_quantity')->where('item_quantity >', 0)->findAll();
        return $this->response->setJSON($items);
    }

    public function newLending()
    {
        $borrowerID = $this->request->getPost('listOfResidents');  // Borrower's ID from the form
        $itemID     = $this->request->getPost('listOfItems');      // Item's ID from the form
        $quantity   = $this->request->getPost('lendQuantity');     // Quantity from the form
        $itemName   = $this->request->getPost('item_name');        // Item name passed via AJAX
        $borrowDesc   = $this->request->getPost('borrowDesc');        // Item name passed via AJAX
        $borrowDate   = $this->request->getPost('borrowDate');        // Item name passed via AJAX
        $returnDate   = $this->request->getPost('returnDate');        // Item name passed via AJAX
    
        if (!$borrowerID || !$itemID || !$quantity || !$itemName || !$borrowDesc) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'All fields are required.'
            ]);
        }
    
        // Check if the item exists in the inventory and if the quantity is enough
        $inventoryModel = new InventoryModel();
        $item = $inventoryModel->find($itemID);
    
        if (!$item) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Item not found in inventory.'
            ]);
        }
    
        // Since $item is an array, access it using $item['item_quantity']
        if ($item['item_quantity'] < $quantity) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Not enough quantity in inventory.'
            ]);
        }
    
        // Proceed to insert data into tbl_lending table
        $lendingModel = new LendingModel();
        $data = [
            'item_id'           => $itemID,
            'item_name'         => $itemName,  
            'borrower_id'       => $borrowerID,
            'borrowed_quantity' => $quantity,
            'borrower_desc' => $borrowDesc,
            'status'            => '1',  
            'date_borrowed'     => $borrowDate,  
            'date_of_return'     => $returnDate,  
        ];
    
        // Save the lending record
        $lendingModel->insert($data);
    
        // Deduct the borrowed quantity from the inventory
        $inventoryModel->update($itemID, [
            'item_quantity' => $item['item_quantity'] - $quantity
        ]);
    
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Lending record saved successfully'
        ]);
    }
    
    
    
    
    
    public function fetchLendItemDetails()
    {
        $id = $this->request->getPost('id');
    
        $lendingModel = new LendingModel();
        $residentModel = new ResidentModel();
    
        $lendingRecord = (array) $lendingModel->find($id);
    
        if ($lendingRecord) {
            $resident = (array) $residentModel->find($lendingRecord['borrower_id']);
            
            if ($resident) {
                $lendingRecord['borrower_fullname'] = $resident['firstname'] . ' ' . $resident['lastname'];
            }
    
            return $this->response->setJSON($lendingRecord);
        } else {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Record not found']);
        }
    }
    public function updateLendingStatus()
{
    $lendId = $this->request->getPost('lendId');
    $status = $this->request->getPost('status');  

    if (!$lendId || !$status) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Missing required parameters'
        ]);
    }

    $lendingModel = new LendingModel();
    $inventoryModel = new InventoryModel();
    
    // Step 1: Fetch the lending record
    $lendingRecord = $lendingModel->find($lendId);
    
    if (!$lendingRecord) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Lending record not found'
        ]);
    }
    
    // Step 2: Update lending status
    $data = [
        'status' => $status,
        'updated_at' => date('Y-m-d H:i:s')
    ];
    
    $update = $lendingModel->update($lendId, $data);

    if ($update) {
        // Step 3: Update the inventory by adding the returned quantity
        $itemId = $lendingRecord['item_id'];  // Get the item ID from lending record
        $lendQuantity = $lendingRecord['borrowed_quantity'];  // Get the quantity returned

        $inventoryRecord = $inventoryModel->find($itemId);

        if ($inventoryRecord) {
            // Increase the inventory quantity by the returned quantity
            $updatedInventoryQuantity = $inventoryRecord['item_quantity'] + $lendQuantity;
            $inventoryModel->update($itemId, ['item_quantity' => $updatedInventoryQuantity]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Item not found in inventory'
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Lending status updated to returned and inventory updated'
        ]);
    } else {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Failed to update lending status'
        ]);
    }
}

// Officials
public function createOfficial()
{
    $validation = \Config\Services::validation();
    $model = new OfficialModel();

    $uploadPath = FCPATH . 'uploads/';

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

    // Validation rules
    $validationRules = [
        'firstname'     => 'required',
        'middlename'    => 'required',
        'lastname'      => 'required',
        'position'      => 'required',
        'start_service' => 'required|valid_date',
        'end_service'   => 'required|valid_date',
    ];

    if (!$this->validate($validationRules)) {
        return $this->response->setJSON([
            'status' => 'validation_error',
            'errors' => $validation->getErrors()
        ]);
    }

    // Get the position
    $position = $this->request->getPost('position');

    // Define the position limits
    $positionLimits = [
        'Administrator'                                => 1,  
        'Captain'                                      => 1,  
        'Comm. On Peace & Order & Public Safety'        => 1,  
        'Comm. On Public Works and Infrastructure'      => 1, 
        'Comm. On Solid Waste Management'               => 1, 
        'Comm. On Appropriations'                       => 1,  
        'Comm. On Nutrition'                           => 1,  
        'Comm. On Women & Family Welfare'               => 1,
        'Comm. On Disaster Preparedness'               => 1,  
        'Chief Tanod'                                  => 1,  
        'Deputy Tanod'                                 => 5, 
        'Member'                                       => 7,  
        'Sk Kagawad'                                   => 7,  
        'Sk Chairperson'                               => 1, 
        'Secretary'                                    => 1,  
        'Treasurer'                                    => 1, 
        'Tanod'                                        => 10, 
    ];



    // Check if the position exists in the limits array
    if (isset($positionLimits[$position])) {
        // Check how many officials already have this position
        $existingOfficials = $model->where('position', $position)
                                    ->where('status','1')
                                    ->countAllResults();

        // Compare with the limit
        if ($existingOfficials >= $positionLimits[$position]) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'The position "' . $position . '" already has the maximum allowed number of officials.'
            ]);
        }
    }

    // Insert the new official data
    $data = [
        'firstname'     => $this->request->getPost('firstname'),
        'middlename'    => $this->request->getPost('middlename'),
        'lastname'      => $this->request->getPost('lastname'),
        'suffix'        => $this->request->getPost('suffix'),
        'position'      => $this->request->getPost('position'),
        'status'        => 1,
        'start_service' => $this->request->getPost('start_service'),
        'end_service'   => $this->request->getPost('end_service'),
        'image'         => $imagePath,
    ];

    if ($model->insert($data)) {
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Official Created Successfully!'
        ]);
    } else {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Failed to create official.'
        ]);
    }
}


public function getOfficials()
{
    $officialModel = new OfficialModel();

    $officials = $officialModel->select('position')->findAll();

    return $this->response->setJSON($officials);
}


public function loadOfficials()
{
    $model = new OfficialModel();
    $officials = $model->findAll();

    $data = [];
    foreach ($officials as $official) {
        $profile_image = !empty($official['image'])
            ? base_url($official['image']) 
            : base_url('uploads/default-profile.png');

        $data[] = [
            "official_id"   => $official['official_id'],
            "full_name"     => $official['firstname'] . ' ' . $official['lastname'],
            "position"      => $official['position'],
            "start_service" => $official['start_service'],
            "end_service"   => $official['end_service'],
            "status"        => $official['status'] == 1 
                ? '<span class="text-success">Active</span>' 
                : '<span class="text-inactive">Inactive</span>',
            "profile_image" => $profile_image,
            "action"        => '<button class="btn__primary table__button viewOfficialBtn" data-id="'.$official['official_id'].'">View</button>'
        ];
    }

    return $this->response->setJSON(["data" => $data]);
}

public function getOfficial()
{
    $officialId = $this->request->getGet('official_id');

    if (!$officialId) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Official ID is required'
        ]);
    }

    $model = new OfficialModel();
    $official = $model->find($officialId);

    if (!$official) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Official not found'
        ]);
    }

    $image = !empty($official['image']) 
    ? $official['image'] 
    : 'uploads/default-profile.png';


    $data = [
        'official_id'    => $official['official_id'],
        'firstname'      => $official['firstname'],
        'middlename'     => $official['middlename'],
        'lastname'       => $official['lastname'],
        'suffix'         => $official['suffix'],
        'position'       => $official['position'],
        'start_service'  => $official['start_service'],
        'end_service'    => $official['end_service'],
        'image'          => $image,
    ];

    return $this->response->setJSON([
        'status' => 'success',
        'data'   => $data
    ]);
}

public function updateOfficial()
{
    $id = $this->request->getPost('official_id');

    if (empty($id)) {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Official ID is missing'
        ]);
    }

    $position = $this->request->getPost('position');

    // Define position limits
    $positionLimits = [
        'Administrator'                                => 1,
        'Captain'                                      => 1,
        'Comm. On Peace & Order & Public Safety'       => 1,
        'Comm. On Public Works and Infrastructure'     => 1,
        'Comm. On Solid Waste Management'              => 1,
        'Comm. On Appropriations'                      => 1,
        'Comm. On Nutrition'                           => 1,
        'Comm. On Women & Family Welfare'              => 1,
        'Comm. On Disaster Preparedness'               => 1,
        'Chief Tanod'                                  => 1,
        'Deputy Tanod'                                 => 5,
        'Member'                                       => 7,
        'Sk Kagawad'                                   => 7,
        'Sk Chairperson'                               => 1,
        'Secretary'                                    => 1,
        'Treasurer'                                    => 1,
        'Tanod'                                        => 10,
    ];

    // Check if position limit exists
    if (isset($positionLimits[$position])) {
        $officialModel = new OfficialModel();

        // Count officials already holding this position, excluding the one being updated
        $currentCount = $officialModel
            ->where('position', $position)
            ->where('official_id !=', $id)
            ->where('status','1')

            ->countAllResults();

        // Compare with limit
        if ($currentCount >= $positionLimits[$position]) {
            return $this->response->setJSON([
                'success' => false,
                'message' => "The maximum number of officials for the position '$position' has already been reached."
            ]);
        }
    }

    // Prepare data for update
    $data = [
        'firstname'      => $this->request->getPost('firstname'),
        'lastname'       => $this->request->getPost('lastname'),
        'middlename'     => $this->request->getPost('middlename'),
        'suffix'         => $this->request->getPost('suffix'),
        'position'       => $position,
        'start_service'  => $this->request->getPost('view_start_service'),
        'end_service'    => $this->request->getPost('view_end_service'),
        'status'         => $this->request->getPost('view_status'),
        'updated_at'     => date('Y-m-d H:i:s')
    ];

    // Handle image upload
    $image = $this->request->getFile('view_profile_image');
    if ($image && $image->isValid() && !$image->hasMoved()) {
        $newName = $image->getRandomName();
        $image->move('uploads/profile_images', $newName);
        $data['image'] = 'uploads/profile_images/' . $newName;
    }

    // Update official
    $updated = $officialModel->update($id, $data);

    if ($updated) {
        return $this->response->setJSON([
            'success'    => true,
            'message'    => 'Official updated successfully',
            'image_url'  => isset($data['image']) ? base_url($data['image']) : null
        ]);
    } else {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Failed to update official'
        ]);
    }
}


public function residentsList()
{
    $residentModel = new ResidentModel();

    $residents = $residentModel
        ->select('resident_id, firstname, middlename, lastname, suffix')
        ->where('status', '1') 
        ->findAll();

    return $this->response->setJSON($residents);
}


    
public function createComplaint()
{
    $complainModel = new ComplainModel();
    $residentModel = new ResidentModel();

    $complainantFullName = $this->request->getPost('complainant');
    $fileAgainstFullName = $this->request->getPost('file_against');
    $date = $this->request->getPost('date');
    $complainTitle = $this->request->getPost('complain_title');
    $complainDetails = $this->request->getPost('complaint_details');
    $typeOfComplaint = $this->request->getPost('type_of_complaint');

    $complainantAge = $this->request->getPost('complainant_age');
    $complainantAddress = $this->request->getPost('complainant_address');
    $incidentLocation = $this->request->getPost('incident_location');
    $barangayAction = $this->request->getPost('barangay_action');

    // Look up complainant by full name (case-insensitive)
    $complainant = $residentModel
        ->where("LOWER(CONCAT(firstname, ' ', lastname))", strtolower($complainantFullName))
        ->first();

    $complainantId = ($complainant) ? $complainant['resident_id'] : null;

    $fileAgainst = $residentModel
        ->where("LOWER(CONCAT(firstname, ' ', lastname))", strtolower($fileAgainstFullName))
        ->first();

    $fileAgainstId = ($fileAgainst) ? $fileAgainst['resident_id'] : null;

    $data = [
        'complainant_id' => $complainantId,
        'complainant_name' => $complainantFullName,
        'complain_against' => $fileAgainstFullName,
        'complain_against_id' => $fileAgainstId,
        'date' => $date,
        'complain_title' => $complainTitle,
        'complain_details' => $complainDetails,
        'type_of_complaint' => $typeOfComplaint,
        'complainant_age' => $complainantAge,
        'complainant_address' => $complainantAddress,
        'location_of_incident' => $incidentLocation,
        'barangay_action' => $barangayAction,
        'status' => 0
    ];

    // Save complaint data
    $complainModel->save($data);

    return $this->response->setJSON([
        'status' => 'success',
        'message' => 'Complaint filed successfully!'
    ]);
}



// Back up with complainant name as select
// public function createComplaint()
// {
//     $complainModel = new ComplainModel();
//     $residentModel = new ResidentModel();

//     $complainantId = $this->request->getPost('complainant');
//     $fileAgainstId = $this->request->getPost('file_against');
//     $date = $this->request->getPost('date');
//     $complainTitle = $this->request->getPost('complain_title');
//     $complainDetails = $this->request->getPost('complaint_details');
//     $typeOfComplaint = $this->request->getPost('type_of_complaint'); 

//     $complainantAge = $this->request->getPost('complainant_age'); 
//     $complainantAddress = $this->request->getPost('complainant_address'); 
//     $incidentLocation = $this->request->getPost('incident_location'); 
//     $barangayAction = $this->request->getPost('barangay_action'); 

//     // Get complainant name using the complainantId
//     $complainant = $residentModel->find($complainantId);
//     $complainantName = $complainant ? $complainant['firstname'] . ' ' . $complainant['lastname'] : null;

//     // Get file against name using the fileAgainstId
//     $fileAgainst = $residentModel->find($fileAgainstId);
//     $fileAgainstName = $fileAgainst ? $fileAgainst['firstname'] . ' ' . $fileAgainst['lastname'] : null;

//     $data = [
//         'complainant_id' => $complainantId,
//         'complainant_name' => $complainantName,
//         'complain_against' => $fileAgainstName,
//         'complain_against_id' => $fileAgainstId,
//         'date' => $date,
//         'complain_title' => $complainTitle,
//         'complain_details' => $complainDetails,
//         'type_of_complaint' => $typeOfComplaint, 
//         'complainant_age' => $complainantAge, 
//         'complainant_address' => $complainantAddress, 
//         'location_of_incident' => $incidentLocation, 
//         'barangay_action' => $barangayAction, 
//         'status' => 0
//     ];

//     $complainModel->save($data);

//     return $this->response->setJSON([
//         'status' => 'success',
//         'message' => 'Complaint filed successfully!'
//     ]);
// }

public function getComplaints() {
    $complainModel = new ComplainModel();
    
    $complaints = $complainModel->findAll();
  
    return $this->response->setJSON([
      'data' => $complaints
    ]);
  }
  public function viewComplaint($complaintId)
{
    $complainModel = new ComplainModel();

    $complaint = $complainModel->find($complaintId);

    if ($complaint) {
        return $this->response->setJSON(['status' => 'success', 'data' => $complaint]);
    } else {
        return $this->response->setJSON(['status' => 'error', 'message' => 'Complaint not found']);
    }
}
public function markAsSolved()
{
    $complaintId = $this->request->getPost('complaint_id');
    $newStatus = $this->request->getPost('status');

    if (empty($complaintId)) {
        return $this->response->setJSON(['status' => 'error', 'message' => 'Missing complaint ID.']);
    }

    $complainModel = new ComplainModel();

    if (!$complainModel->find($complaintId)) {
        return $this->response->setJSON(['status' => 'error', 'message' => 'Complaint not found.']);
    }

    // Safe update
    $complainModel->update($complaintId, ['status' => $newStatus]);

    return $this->response->setJSON(['status' => 'success']);
}


// User Account
public function updateUserImage()
{
    $session = session();
    $token = $session->get('token');

    if (empty($token)) {
        return $this->response->setJSON(['success' => false, 'message' => 'Session expired or token missing']);
    }

    $data = [
        'updated_at' => date('Y-m-d H:i:s')
    ];

    $file = $this->request->getFile('view_profile_image');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move('uploads/', $newName);
        $data['image'] = 'uploads/' . $newName;
        $session->set('image', $data['image']);
    } else {
        return $this->response->setJSON(['success' => false, 'message' => 'Invalid or missing file']);
    }

    $userModel = new UserModel();
    $update = $userModel->where('token', $token)->set($data)->update();

    if ($update) {
        return $this->response->setJSON([
            'success' => true,
            'message' => 'User image updated successfully',
            'image_url' => base_url($data['image'])
        ]);
    } else {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Failed to update image'
        ]);
    }
}
public function deleteUserImage()
{
    $token = $this->request->getPost('token');

    if (empty($token)) {
        return $this->response->setJSON(['success' => false, 'message' => 'Token is missing']);
    }

    $userModel = new UserModel();
    $user = $userModel->where('token', $token)->first();

    if ($user && !empty($user['image'])) {
        $imagePath = WRITEPATH . '../public/' . $user['image']; 
        if (is_file($imagePath)) {
            unlink($imagePath);
        }

        $userModel->where('token', $token)->set(['image' => null])->update();

        session()->set('image', null);

        return $this->response->setJSON(['success' => true]);
    }

    return $this->response->setJSON(['success' => false, 'message' => 'User not found or no image to delete']);
}

public function updateUserInformation()
{
    $session = session();
    $token = $session->get('token');
    
    if (empty($token)) {
        return $this->response->setJSON(['success' => false, 'message' => 'Token is missing']);
    }

    $data = [
        'firstname'  => $this->request->getPost('firstname'),
        'lastname'   => $this->request->getPost('lastname'),
        'middlename' => $this->request->getPost('middlename'),
        'suffix'     => $this->request->getPost('suffix'),
        'username'   => $this->request->getPost('username'),
        'updated_at' => date('Y-m-d H:i:s'),
    ];

    $userModel = new UserModel();
    $update = $userModel->where('token', $token)->set($data)->update();

    if ($update) {
        $session->set('firstname', $data['firstname']);
        $session->set('lastname', $data['lastname']);
        $session->set('middlename', $data['middlename']);
        $session->set('suffix', $data['suffix']);
        $session->set('username', $data['username']);
        
        return $this->response->setJSON(['success' => true, 'message' => 'User information updated successfully']);
    } else {
        return $this->response->setJSON(['success' => false, 'message' => 'Failed to update user information']);
    }
}

public function updatePassword()
{
    $session = session();
    $userModel = new UserModel();
    $validation = \Config\Services::validation();

    $user = $userModel->where('token', $session->get('token'))->first();
    if (!$user) {
        return $this->response->setJSON(['success' => false, 'message' => 'User not found.']);
    }

    $rules = [
        'current_password' => 'required',
        'new_password' => 'required|min_length[5]',
        'confirm_password' => 'required|matches[new_password]'
    ];

    if (!$this->validate($rules)) {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Validation failed.',
            'errors' => $validation->getErrors()
        ]);
    }

    $currentPassword = $this->request->getPost('current_password');
    $newPassword = $this->request->getPost('new_password');

    if (!password_verify($currentPassword, $user['password'])) {
        return $this->response->setJSON(['success' => false, 'message' => 'Current password is incorrect.']);
    }

    $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $data = [
        'password' => $hashedNewPassword,
        'updated_at' => date('Y-m-d H:i:s')
    ];

    if ($userModel->where('token', $session->get('token'))->set($data)->update()) {
        return $this->response->setJSON(['success' => true, 'message' => 'Password updated successfully.']);
    } else {
        return $this->response->setJSON(['success' => false, 'message' => 'Failed to update password.']);
    }
}

public function countHouseWithStatus()
{
    $houseModel = new HouseModel();

    $count = $houseModel->where('status', 1)->countAllResults();

    return $this->response->setJSON(['count' => $count]);
}
public function countResidents()
{
    $residentModel = new ResidentModel(); 

    $count = $residentModel->where('status', 1)->countAllResults();

    return $this->response->setJSON(['count' => $count]);
}
public function countCompletedComplaints()
{
    $complainModel = new ComplainModel();

    $count = $complainModel->where('status', 1)->countAllResults();

    return $this->response->setJSON(['count' => $count]);
}
public function countPendingComplaints()
{
    $complainModel = new ComplainModel();

    $count = $complainModel->where('status', 0)->countAllResults();

    return $this->response->setJSON(['count' => $count]);
}

public function getResidentStats()
{
    $residentModel = new ResidentModel();

    $today = date('Y-m-d');
    $minorDate = date('Y-m-d', strtotime('-18 years'));

    $data = [
        'male' => $residentModel->where(['gender' => 'Male', 'status' => 1])->countAllResults(),
        'female' => $residentModel->where(['gender' => 'Female', 'status' => 1])->countAllResults(),
        'minors' => $residentModel->where('birthdate >=', $minorDate)->where('status', 1)->countAllResults(),
        'non_voters' => $residentModel->where(['is_voter_of_barangay' => 'No', 'status' => 1])->countAllResults(),
        'non_head' => $residentModel->where(['is_family_head' => 'No', 'status' => 1])->countAllResults(),
        'head_of_family' => $residentModel->where(['is_family_head' => 'Yes', 'status' => 1])->countAllResults(),
        'archived' => $residentModel->where('status', 0)->countAllResults(),
        'pwd' => $residentModel->where(['is_pwd' => 'Yes', 'status' => 1])->countAllResults(),
        'voters' => $residentModel->where(['is_voter_of_barangay' => 'Yes', 'status' => 1])->countAllResults(),
    ];

    return $this->response->setJSON($data);
}
public function getEventsDashboard()
{
    $eventModel = new EventModel();
    
    $events = $eventModel
        ->where('status', 1)
        ->orderBy('start_date', 'ASC') 
        ->findAll();

    return $this->response->setJSON($events);
}

public function getNewUsers()
{
    $userModel = new UserModel();
    
    $newUsers = $userModel->orderBy('created_at', 'DESC')->findAll(25); 

    $data = [];
    foreach ($newUsers as $user) {
        $data[] = [
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'role' => $user['role'] ?? 'N/A', 
            'created_at' => $user['created_at'],
            'image' => $user['image'] ?? 'default-image.png', 
        ];
    }

    // Return the data as JSON
    return $this->response->setJSON($data);
}
public function getUpcomingBirthdays()
{
    $residentModel = new \App\Models\ResidentModel();

    $today = date('m-d');

    $builder = $residentModel->where('status', 1)
        ->select("resident_id, firstname, middlename, lastname, suffix, birthdate, 
            DATE_FORMAT(birthdate, '%m-%d') as bday,
            (DATE_FORMAT(birthdate, '%m-%d') >= '$today') as upcoming")
        ->orderBy('upcoming', 'DESC')  // Prioritize birthdays later in the year
        ->orderBy('bday', 'ASC')       // Sort by month and day
        ->limit(10);

    $residents = $builder->findAll();

    $data = [];
    foreach ($residents as $res) {
        $fullName = trim("{$res['firstname']} {$res['middlename']} {$res['lastname']} {$res['suffix']}");
        $data[] = [
            'full_name' => $fullName,
            'birthdate' => $res['birthdate'],
        ];
    }

    return $this->response->setJSON($data);
}



public function indigencyCert()
{
    // You can pass data to the view here if needed
    $data = [
        'certificationNo' => $this->request->getGet('ref_no') ?? '2024-0215',
        'leftLogoPath' => base_url('assets/images/left-logo.png'),
        'rightLogoPath' => base_url('assets/images/right-logo.png'),
        'title' => 'Indigency Certificate',
        // Add other dynamic data here
    ];
    
    return view('certification/indigency', $data);
}

public function ResetPassword()
{
    $request = $this->request->getJSON();
    $username = $request->username ?? '';  // The username here is actually the email

    $model = new UserModel();
    
    // Searching for the email inside the 'username' column
    $user = $model->where('username', $username)->first();

    if (!$user) {
        return $this->response->setStatusCode(404)->setJSON(['message' => 'User not found.']);
    }

    // Create the reset link
    $resetLink = site_url('reset-password?username=' . urlencode($username));

    // Send the email with reset link
    $email = \Config\Services::email();
    $email->setTo($user['username']);  // 'username' holds the email
    $email->setSubject('Reset Your Password');
    $email->setMessage("
        Hi {$user['username']},<br><br>
        Click the button below to reset your password to <b>default123</b>:<br><br>
        <a href='$resetLink' style='padding:10px 20px; background:#007bff; color:#fff; text-decoration:none; border-radius:5px;'>Reset Password</a>
        <br><br>After logging in, you can change your password anytime.
    ");

    if ($email->send()) {
        return $this->response->setJSON(['message' => 'Reset link sent to your email.']);
    } else {
        return $this->response->setStatusCode(500)->setJSON(['message' => 'Failed to send email.']);
    }
}


public function ResetNow()
{
    $username = $this->request->getGet('username');
    if (!$username) {
        return redirect()->to('/')->with('error', 'Invalid reset link.');
    }

    $model = new UserModel();
    // Fetch the user based on the username
    $user = $model->where('username', $username)->first();

    if (!$user) {
        return redirect()->to('/')->with('error', 'User not found.');
    }

    // Hash the new password
    $hashedPassword = password_hash('default123', PASSWORD_DEFAULT);
    
    // Update the password directly using the username
    $model->set('password', $hashedPassword)
          ->where('username', $username)
          ->update();

    return redirect()->to('/')->with('success', 'Password has been reset to default123. Please log in.');
}

public function createSuffix()
{
    $suffix = $this->request->getPost('suffix');

    if (!$suffix) {
        return $this->response->setJSON(['status' => 'error', 'message' => 'Suffix is required.']);
    }

    $model = new SuffixModel();
    
    // Check if the suffix already exists
    $existingSuffix = $model->where('suffix_title', $suffix)->first();

    if ($existingSuffix) {
        // If the existing suffix has a status of 1 (active), don't allow creating it
        if ($existingSuffix['status'] == 1) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'This suffix already exists and is active.']);
        }
        
        // If the status is 0 (inactive), update it to active (status = 1)
        $model->update($existingSuffix['id'], [
            'status' => 1,
            'updated_at' => date('Y-m-d H:i:s')  // Optionally, update the timestamp
        ]);
        
        return $this->response->setJSON(['status' => 'success', 'message' => 'Suffix created successfully.']);
    } else {
        $model->insert([
            'suffix_title' => $suffix,
            'status' => 1,  
        ]);
        
        return $this->response->setJSON(['status' => 'success', 'message' => 'Suffix created successfully.']);
    }
}


public function getSuffixes()
{
    $model = new SuffixModel();
    $suffixes = $model->where('status', 1)->findAll(); // Only active

    return $this->response->setJSON([
        'status' => 'success',
        'data' => $suffixes
    ]);
}

public function deleteSuffix()
{
    $id = $this->request->getPost('id');

    if (!$id) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Invalid suffix ID.'
        ]);
    }

    $model = new SuffixModel();

    $suffix = $model->find($id);

    if (!$suffix) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Suffix not found.'
        ]);
    }

    // Set status = 0 (soft delete)
    $model->update($id, ['status' => 0]);

    return $this->response->setJSON([
        'status' => 'success',
        'message' => 'Suffix deleted successfully.'
    ]);
}

public function updateSuffix()
{
    $id = $this->request->getPost('id');
    $suffix = $this->request->getPost('suffix');

    if (!$id || !$suffix) {
        return $this->response->setJSON(['status' => 'error', 'message' => 'Missing data.']);
    }

    $model = new SuffixModel();

    // Check if the new suffix already exists (status = 1 and not the same ID)
    $exists = $model->where('suffix_title', $suffix)
                    ->where('status', 1)
                    ->where('id !=', $id)
                    ->first();

    if ($exists) {
        return $this->response->setJSON(['status' => 'error', 'message' => 'This suffix already exists.']);
    }

    $model->update($id, ['suffix_title' => $suffix]);
    return $this->response->setJSON(['status' => 'success']);
}

public function createPosition()
{
  $positionName = $this->request->getPost('position');

  if (!$positionName) {
    return $this->response->setJSON([
      'status' => 'error',
      'message' => 'Position name is required.'
    ]);
  }

  $positionModel = new PositionModel();

  // Check for duplicate with status = 1
  $existing = $positionModel
    ->where('position_name', $positionName)
    ->where('status', 1)
    ->first();

  if ($existing) {
    return $this->response->setJSON([
      'status' => 'error',
      'message' => 'This position already exists.'
    ]);
  }

  $positionModel->save([
    'position_name' => $positionName,
    'status' => 1
  ]);

  return $this->response->setJSON([
    'status' => 'success',
    'message' => 'Position created successfully.'
  ]);
}
    public function getPositions()
    {
        $model = new PositionModel();
        $positions = $model->where('status', 1)->findAll(); // Fetch only active positions (status = 1)
        return $this->response->setJSON([
            'status' => 'success',
            'data' => $positions
        ]);
    }

    // Create a new position


    // Delete (soft delete) a position (set status to 0)
    public function deletePosition()
    {
        $positionID = $this->request->getPost('id');

        if (!$positionID) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Position ID is required.']);
        }

        $model = new PositionModel();

        // Update the status to 0 to mark as deleted
        $model->update($positionID, ['status' => 0]);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Position deleted successfully.']);
    }

    public function updatePosition()
{
    $id = $this->request->getPost('id');
    $position = $this->request->getPost('position');

    if (!$id || !$position) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Position and ID are required.'
        ]);
    }

    $model = new PositionModel();
    $existing = $model->where('position_name', $position)
                      ->where('id !=', $id)
                      ->where('status', 1)
                      ->first();

    if ($existing) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'This position already exists.'
        ]);
    }

    $updated = $model->update($id, ['position_name' => $position]);

    return $this->response->setJSON([
        'status' => $updated ? 'success' : 'error',
        'message' => $updated ? 'Updated successfully' : 'Update failed.'
    ]);
}


public function getSuffixesSelect()
{
    $model = new SuffixModel();
    $suffixes = $model->where('status', 1)->findAll();

    return $this->response->setJSON([
        'status' => 'success',
        'data' => $suffixes
    ]);
}

public function getActivePositions()
{
    $positionModel = new PositionModel();
    $positions = $positionModel->where('status', 1)->orderBy('position_name', 'ASC')->findAll();

    return $this->response->setJSON([
        'status' => 'success',
        'data' => $positions
    ]);
}

public function createBackup()
{
    $host     = 'localhost';
    $username = 'root';
    $password = 'Fastcat_01'; 
    $database = 'db_barangay';

    $fileName = 'db_backup_' . date('Y-m-d_H-i-s') . '.sql';
    $filePath = WRITEPATH . 'backups/' . $fileName;

    if (!is_dir(WRITEPATH . 'backups')) {
        mkdir(WRITEPATH . 'backups', 0777, true);
    }

    $command = "mysqldump --user={$username} --password=\"{$password}\" --host={$host} {$database} > {$filePath}";
    exec($command, $output, $result);

    if ($result !== 0) {
        return $this->response->setStatusCode(500)->setBody('Backup failed. Please check credentials or mysqldump availability.');
    }

    return $this->response->download($filePath, null)->setFileName($fileName);
}

public function downloadFile()
{
    $database = getenv('database.default.database');

    // Get connection object and set the charset
    $db = db_connect();
    $timestamp = date('YmdHis');
    $backupDir = FCPATH . 'Upload';

    // Ensure the directory exists, create it if it doesn't
    if (!is_dir($backupDir)) {
        mkdir($backupDir, 0777, true);  // Make directory with write permissions
    }
    $backupFileName = $backupDir.'/'.$database. $timestamp . '.sql';

    // Open the backup file for writing
    $file = fopen($backupFileName, 'w');

    // Write the initial SQL for the backup
    fwrite($file, "-- Database backup of {$database} created on {$timestamp}\n\n");

    // Get all table names
    $tables = $db->query("SHOW TABLES")->getResultArray();

    // Loop through each table
    foreach ($tables as $table) {
        $tableName = $table["Tables_in_{$database}"];

        // Write the CREATE TABLE statement
        $createTableQuery = $db->query("SHOW CREATE TABLE `{$tableName}`")->getRow();
        fwrite($file, "\n\n-- Creating table {$tableName} --\n");
        fwrite($file, $createTableQuery->{'Create Table'} . ";\n");

        // Write the INSERT INTO statements for each row in the table
        fwrite($file, "\n\n-- Inserting data into {$tableName} --\n");

        // Fetch the data from the table
        $rows = $db->query("SELECT * FROM `{$tableName}`")->getResultArray();
        foreach ($rows as $row) {
            $columns = array_keys($row);
            $values = array_map(function ($value) {
                return "'" . addslashes($value) . "'"; // Escape string values
            }, array_values($row));

            $insertQuery = "INSERT INTO `{$tableName}` (" . implode(',', $columns) . ") VALUES (" . implode(',', $values) . ");\n";
            fwrite($file, $insertQuery);
        }
    }

    // Close the backup file
    fclose($file);

    // Serve the file for download
    return $this->downloadBackup($backupFileName);
}

private function downloadBackup($filePath)
{
    // Set headers to force file download
    return $this->response->setHeader('Content-Type', 'application/octet-stream')
        ->setHeader('Content-Disposition', 'attachment; filename="' . basename($filePath) . '"')
        ->setHeader('Content-Length', filesize($filePath))
        ->setBody(file_get_contents($filePath));
}

private function deleteAllTables($db)
{
    // Get a list of all tables in the database
    $tables = $db->listTables();

    // Drop each table in the database
    foreach ($tables as $table) {
        try {
            $db->query("DROP TABLE IF EXISTS `$table`");
        } catch (\Exception $e) {
            log_message('error', 'Error dropping table ' . $table . ': ' . $e->getMessage());
            return false; // Return false if any table cannot be dropped
        }
    }

    return true;
}


public function restore()
{
    // Check if a file has been uploaded
    if ($this->request->getFile('backup_file')->isValid()) {
        // Get the uploaded file
        $uploadedFile = $this->request->getFile('backup_file');
        $filePath = WRITEPATH . 'uploads/' . $uploadedFile->getName();
        
        // Ensure the directory exists
        if (!is_dir(dirname($filePath))) {
            mkdir(dirname($filePath), 0777, true);
        }
        
        // Move the uploaded file
        if ($uploadedFile->move(WRITEPATH . 'uploads')) {
            // Read the contents of the SQL file
            $sql = file_get_contents($filePath);
            
            if ($sql === false) {
                log_message('error', 'Unable to read uploaded SQL file: ' . $filePath);
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Unable to read the uploaded SQL file.'
                ]);
            }
            
            // Access the database connection
            $db = \Config\Database::connect();
            
            // Start a transaction
            $db->transStart();
            
            try {
                // Step 1: Delete all tables before restoring
                if (!$this->deleteAllTables($db)) {
                    throw new \Exception('Failed to delete existing tables.');
                }

                // Step 2: Execute the SQL commands from the uploaded file
                $this->executeSqlQueries($db, $sql);
                
                // Commit the transaction
                $db->transComplete();
                
                // Check if the transaction was successful
                if ($db->transStatus() === false) {
                    $error = $db->error();
                    log_message('error', 'Database restore failed: ' . json_encode($error));
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Database restore failed: ' . ($error['message'] ?? 'Unknown error')
                    ]);
                } else {
                    // Optionally remove the file after processing
                    unlink($filePath);
                    
                    return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Database restored successfully.'
                    ]);
                }
            } catch (\Exception $e) {
                log_message('error', 'Unexpected error during restore: ' . $e->getMessage());
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Unexpected error during restore: ' . $e->getMessage()
                ]);
            }
        } else {
            log_message('error', 'Failed to move uploaded file.');
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to move uploaded file.'
            ]);
        }
    } else {
        $fileError = $this->request->getFile('backup_file')->getError();
        log_message('error', 'File upload error: ' . $fileError);
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'No valid file uploaded. Error: ' . $fileError
        ]);
    }
}


private function executeSqlQueries($db, $sql)
{
    // Better SQL parsing that handles delimiter-based statements
    $delimiter = ';';
    $sql = rtrim(trim($sql), $delimiter);
    $buffer = '';
    $queries = [];
    
    // Parse SQL with potential delimiter changes
    foreach (explode("\n", $sql) as $line) {
        $line = trim($line);
        
        // Skip comments and empty lines
        if (empty($line) || substr($line, 0, 2) == '--' || substr($line, 0, 1) == '#') {
            continue;
        }
        
        // Check for delimiter change
        if (preg_match('/DELIMITER\s+([^\s]+)/i', $line, $matches)) {
            $delimiter = $matches[1];
            continue;
        }
        
        // Add the line to the current query
        $buffer .= $line . ' ';
        
        // If the line ends with the delimiter, execute the query
        if (substr($line, -strlen($delimiter)) == $delimiter) {
            $buffer = substr($buffer, 0, -strlen($delimiter));
            $queries[] = $buffer;
            $buffer = '';
        }
    }
    
    // Add any remaining query
    if (!empty($buffer)) {
        $queries[] = $buffer;
    }
    
    // Execute each query
    foreach ($queries as $query) {
        if (trim($query)) {
            try {
                $db->query($query);
            } catch (\Exception $e) {
                log_message('error', 'Error in SQL query: ' . $e->getMessage() . "\nQuery: " . $query);
                throw $e;
            }
        }
    }
}
}

