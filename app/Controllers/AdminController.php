<?php
namespace App\Controllers;
use App\Models\UserModel; 
use App\Models\EventModel; 
use App\Models\ResidentModel; 
use App\Models\HouseModel; 
use App\Models\InventoryModel;
use App\Models\LendingModel;
use App\Models\OfficialModel;
use App\Models\ComplainModel;
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
    public function filterResidents()
    {
        $residentModel = new ResidentModel();
        $filter = $this->request->getGet('filter');
    
        $residentModel->where('status', '1');
    
        if (!empty($filter)) {
            $residentModel->groupStart()
                ->where('gender', $filter)
                ->orWhere('civil_status', $filter)
                ->groupEnd();
        }
    
        $residents = $residentModel->findAll();
    
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
    
    public function createItem()
    {
        $validation = \Config\Services::validation();
        $session = session();
        $model = new InventoryModel();
    
        // Define the upload path inside a subfolder 'inventory'
        $uploadPath = FCPATH . 'uploads/inventory/';
    
        // Ensure the uploads/inventory directory exists
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true); // Create the folder if it doesn't exist
        }
    
        // Get the uploaded image
        $file = $this->request->getFile('image');
        if (!$file) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No file uploaded.'
            ]);
        }
    
        // Handle the file upload
        if ($file->isValid() && !$file->hasMoved()) {
            // Generate a random name for the file and move it to the 'uploads/inventory' folder
            $newName = $file->getRandomName();
            $file->move($uploadPath, $newName);
    
            // Save only the filename in the database (no path)
            $imagePath = $newName; // Store only the filename
        } else {
            $imagePath = null;
        }
    
        // Check if image was uploaded successfully
        if (!$imagePath) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Please select an image.'
            ]);
        }
    
        // Get form data
        $assetName = $this->request->getPost('item_name');
        $assetQuantity = $this->request->getPost('item_quantity');
    
        // Validate form data (you can add more validation as needed)
        if (empty($assetName) || empty($assetQuantity)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Asset name and quantity are required.'
            ]);
        }
    
        // Prepare data to save
        $data = [
            'item_name' => $assetName,
            'item_quantity' => $assetQuantity,
            'image' => $imagePath, // Store only the filename in the database
            'status' => 1, // Assuming you are setting the status to 1
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

    public function updateItem()
    {
        $validation = \Config\Services::validation();
        $model = new InventoryModel();
    
        // Validate input data
        $validation->setRules([
            'view_asset_name' => 'required',
            'view_asset_quantity' => 'required|is_natural_no_zero',
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
        $currentImage = $this->request->getPost('current_image');
        
        // Debug information
        log_message('debug', 'POST data: ' . json_encode($this->request->getPost()));
        log_message('debug', 'FILES data: ' . json_encode($this->request->getFiles()));
        
        // Prepare the updated data
        $data = [
            'item_name' => $itemName,
            'item_quantity' => $itemQuantity
        ];
        
        // Try to get the file from different possible input names
        $file = $this->request->getFile('viewFileInput');
        if (!$file || !$file->isValid()) {
            $file = $this->request->getFile('image_file');
        }
        
        // Process file if it exists and is valid
        if ($file && $file->isValid() && !$file->hasMoved()) {
            log_message('debug', 'Valid file found: ' . $file->getName());
            
            // Generate a new random file name
            $newName = $file->getRandomName();
            
            // Define upload paths
            $uploadPath = 'uploads/inventory/';
            $fullPath = FCPATH . $uploadPath;
            
            // Check if directory exists
            if (!is_dir($fullPath)) {
                mkdir($fullPath, 0777, true);
            }
            
            // Move the file
            if ($file->move($fullPath, $newName)) {
                // Set the new image name in data
                $data['image'] = $newName;
                
                log_message('debug', 'File moved successfully: ' . $newName);
            } else {
                log_message('error', 'Failed to move file: ' . $file->getErrorString());
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'File upload failed: ' . $file->getErrorString()
                ]);
            }
        } else {
            log_message('debug', 'No valid file uploaded, keeping current image');
        }
        
        // Update the database
        try {
            if ($model->update($itemId, $data)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Item updated successfully!'
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
            ->select("resident_id, CONCAT_WS(' ', firstname, middlename, lastname, suffix) as fullname")
            ->where('status', 1) // optional: only active residents
            ->findAll();
    
        return $this->response->setJSON($residents);
    }
    
    
    public function fetchItems()
    {
        $itemModel = new InventoryModel();
        $items = $itemModel->select('item_id, item_name')->where('item_quantity >', 0)->findAll();
        return $this->response->setJSON($items);
    }

    public function newLending()
    {
        $borrowerID = $this->request->getPost('listOfResidents');  // Borrower's ID from the form
        $itemID     = $this->request->getPost('listOfItems');      // Item's ID from the form
        $quantity   = $this->request->getPost('lendQuantity');     // Quantity from the form
        $itemName   = $this->request->getPost('item_name');        // Item name passed via AJAX
    
        if (!$borrowerID || !$itemID || !$quantity || !$itemName) {
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
            'status'            => '1',  // assuming '1' means active or borrowed
            'date_borrowed'     => date('Y-m-d'),  
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
    $model = new \App\Models\OfficialModel();

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

    // You can add validation rules here if needed (email, date, etc.)
    // For example:
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

    $data = [
        'firstname'      => $this->request->getPost('firstname'),
        'lastname'       => $this->request->getPost('lastname'),
        'middlename'     => $this->request->getPost('middlename'),
        'suffix'         => $this->request->getPost('suffix'),
        'position'       => $this->request->getPost('position'),
        'start_service'  => $this->request->getPost('view_start_service'),
        'end_service'    => $this->request->getPost('view_end_service'),
        'status'         => $this->request->getPost('view_status'),
        'updated_at'     => date('Y-m-d H:i:s')
    ];

    $image = $this->request->getFile('view_profile_image');
    if ($image && $image->isValid() && !$image->hasMoved()) {
        $newName = $image->getRandomName();
        $image->move('uploads/profile_images', $newName);
        $data['image'] = 'uploads/profile_images/' . $newName;
    }

    $officialModel = new \App\Models\OfficialModel();
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

    $complainantId = $this->request->getPost('complainant');
    $fileAgainstId = $this->request->getPost('file_against');
    $date = $this->request->getPost('date');
    $complainTitle = $this->request->getPost('complain_title');
    $complainDetails = $this->request->getPost('complaint_details');
    $typeOfComplaint = $this->request->getPost('type_of_complaint'); 

    // Get complainant name using the complainantId
    $complainant = $residentModel->find($complainantId);
    $complainantName = $complainant ? $complainant['firstname'] . ' ' . $complainant['lastname'] : null;

    // Get file against name using the fileAgainstId
    $fileAgainst = $residentModel->find($fileAgainstId);
    $fileAgainstName = $fileAgainst ? $fileAgainst['firstname'] . ' ' . $fileAgainst['lastname'] : null;

    $data = [
        'complainant_id' => $complainantId,
        'complainant_name' => $complainantName,
        'complain_against' => $fileAgainstName,
        'complain_against_id' => $fileAgainstId,
        'date' => $date,
        'complain_title' => $complainTitle,
        'complain_details' => $complainDetails,
        'type_of_complaint' => $typeOfComplaint, 
        'status' => 0
    ];

    $complainModel->save($data);

    return $this->response->setJSON([
        'status' => 'success',
        'message' => 'Complaint filed successfully!'
    ]);
}

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
    $complainModel = new ComplainModel();

    $complainModel->update($complaintId, ['status' => 1]);

    return $this->response->setJSON(['status' => 'success']);
}

}

