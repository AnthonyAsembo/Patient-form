<?php
$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "patient_info_db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$last_name = $_POST['last_name'];
$first_name = $_POST['first_name'];
$middle_initial = $_POST['middle_name'];
$sex = $_POST['sex'];
$age_years = $_POST['age_years'];
$age_months = $_POST['age_months'];
$race = $_POST['race'];
$date_of_birth = $_POST['date_of_birth'];
$hispanic_or_latino = isset($_POST['hispanic_or_latino']) ? 1 : 0;
$medical_record_number = $_POST['medical_record_number'];
$street = $_POST['street'];
$city = $_POST['city'];
$county = $_POST['county'];
$state = $_POST['state'];
$facility_name = $_POST['facility_name'];
$facility_city = $_POST['facility_city'];
$facility_county = $_POST['facility_county'];
$facility_state = $_POST['facility_state'];
$facility_phone = $_POST['facility_phone'];


$sql = "INSERT INTO Address (Street, City, County, State) VALUES ('$street', '$city', '$county', '$state')";
if ($conn->query($sql) === TRUE) {
    $address_id = $conn->insert_id;
} else {
    die("Error: " . $sql . "<br>" . $conn->error);
}


$sql = "INSERT INTO Facility (FacilityName, City, County, State, PhoneNumber) VALUES ('$facility_name', '$facility_city', '$facility_county', '$facility_state', '$facility_phone')";
if ($conn->query($sql) === TRUE) {
    $facility_id = $conn->insert_id;
} else {
    die("Error: " . $sql . "<br>" . $conn->error);
}


$sql = "INSERT INTO Patient (LastName, FirstName, MiddleName, Sex, AgeYears, AgeMonths, Race, DateOfBirth, HispanicOrLatino, MedicalRecordNumber, AddressID, FacilityID) VALUES ('$last_name', '$first_name', '$middle_initial', '$sex', $age_years, $age_months, '$race', '$date_of_birth', $hispanic_or_latino, '$medical_record_number', $address_id, $facility_id)";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    die("Error: " . $sql . "<br>" . $conn->error);
}

$conn->close();
?>