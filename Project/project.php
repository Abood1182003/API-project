<?php

// اتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// إضافة طالب جديد
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];
    $name = $data['name'];
    $age = $data['age'];

    $sql = "INSERT INTO students (id, name, age) VALUES ('$id', '$name', '$age')";

    if ($conn->query($sql) === TRUE) {
        $response = array('message' => 'تمت إضافة الطالب بنجاح');
        echo json_encode($response);
    } else {
        $response = array('message' => 'حدث خطأ في إضافة الطالب');
        echo json_encode($response);
    }
}

// الحصول على جميع الطلاب
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);
    $students = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
    }

    echo json_encode($students);
}

// حذف طالب
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $_GET['id'];

    $sql = "DELETE FROM students WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        $response = array('message' => 'تم حذف الطالب بنجاح');
        echo json_encode($response);
    } else {
        $response = array('message' => 'حدث خطأ في حذف الطالب');
        echo json_encode($response);
    }
}

// تعديل بيانات طالب
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];
    $name = $data['name'];
    $age = $data['age'];

    $sql = "UPDATE students SET name = '$name', age = '$age' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        $response = array('message' => 'تم تحديث بيانات الطالب بنجاح');
        echo json_encode($response);
    } else {
        $response = array('message' => 'حدث خطأ في تحديث بيانات الطالب');
        echo json_encode($response);
    }
}

$conn->close();

?>


<?php

// عمليات إدراج البيانات
function insertStudent($studentData) {
    // قم بتنفيذ عملية إدراج البيانات في قاعدة البيانات
}

// عمليات الحصول على البيانات
function getAllStudents() {
    // قم بتنفيذ عملية استرجاع البيانات من قاعدة البيانات
    // وإرجاع النتيجة
}

// عملية حذف طالب
function deleteStudent($studentId) {
    // قم بتنفيذ عملية حذف البيانات من قاعدة البيانات
}

// عملية تحديث بيانات الطالب
function updateStudent($studentId, $updatedData) {
    // قم بتنفيذ عملية تحديث البيانات في قاعدة البيانات
}

// افتح اتصال بقاعدة البيانات
// يمكنك استخدام مكتبة PDO للاتصال بقاعدة البيانات
$dsn = 'mysql:host=localhost;dbname=database_name';
$username = 'username';
$password = 'password';

try {
    $db = new PDO($dsn, $username, $password);
    // قم بتعيين خيارات إضافية لاتصال قاعدة البيانات إذا لزم الأمر
} catch (PDOException $e) {
    echo 'فشل الاتصال بقاعدة البيانات: ' . $e->getMessage();
    die();
}

// استقبال الطلبات من التطبيق المحمول
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // قم بالتحقق من نوع العملية وتنفيذ الإجراء المناسب
    if ($_POST['operation'] === 'insert') {
        // إدراج طالب جديد
        insertStudent($_POST['studentData']);
    } elseif ($_POST['operation'] === 'update') {
        // تحديث بيانات الطالب
        updateStudent($_POST['studentId'], $_POST['updatedData']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // قم بالتحقق من نوع العملية وتنفيذ الإجراء المناسب
    if ($_GET['operation'] === 'getAll') {
        // الحصول على جميع الطلاب
        $students = getAllStudents();
        // قم بإرجاع البيانات كرد على الطلب
        echo json_encode($students);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // قم بالتحقق من نوع العملية وتنفيذ الإجراء المناسب
    if ($_GET['operation'] === 'delete') {
        // حذف طالب
        deleteStudent($_GET['studentId']);
    }
}

?>
