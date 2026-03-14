<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentMarksController;
use App\Http\Controllers\SubjectTeacherForEachSectionsController;
use App\Http\Controllers\StudentSubjectAttendanceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\DailyTeacherAllocationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HoursController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\DomPdfController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
////////////For pdf download

Route::get('get-pdf/{studentId}',[DomPdfController::class,'getPdf'])->name('getPdf');
Route::post('users/view-pdf', [HomeController::class, 'viewPDF'])->name('view-pdf');
Route::post('users/download-pdf', [HomeController::class, 'downloadPDF'])->name('download-pdf');
// Route::get('/', [ProjectController::class, 'index']);

Route::resource('projects', ProjectController::class);

Route::get('/', function () {
    return view('welcome');
});

//////Create timetable//////
Route::post('generateTimetable', [TimetableController::class, 'generateTimetable'])->name('generateTimetable');
////////////Add Priority/////////

Route::post('createPriority', [PriorityController::class, 'createPriority'])->name('createPriority');
Route::post('editPriority', [PriorityController::class, 'updatePriority'])->name('editPriority');
////Assign teachers of subjects to various classes
/////SubjectTeacherForEachSectionsController////
Route::get('getDetailsOfSubjectTeacherForEachSections', [SubjectTeacherForEachSectionsController::class, 'getDetailsOfSubjectTeacherForEachSections'])->name('getDetailsOfSubjectTeacherForEachSections');
Route::post('TeacherForClassSubject', [SubjectTeacherForEachSectionsController::class, 'TeacherForClassSubject'])->name('TeacherForClassSubject');
Route::post('deleteEntryTeacher', [SubjectTeacherForEachSectionsController::class, 'deleteEntryTeacher'])->name('deleteEntryTeacher');
Route::post('updateTeacherForClassSubject', [SubjectTeacherForEachSectionsController::class, 'updateTeacherForClassSubject'])->name('updateTeacherForClassSubject');
Route::resource('SubjectTeacherForEachSections', 'SubjectTeacherForEachSectionsController');
//////Role creation////////

Route::get('getDetailsOfStatus', [StatusController::class, 'getDetailsOfStatus'])->name('getDetailsOfStatus');
Route::post('createStatus', [StatusController::class, 'createStatus'])->name('createStatus');
Route::post('updateStatus', [StatusController::class, 'updateStatus'])->name('updateStatus');
Route::post('destroyStatus', [StatusController::class, 'destroyStatus'])->name('destroyStatus');
Route::resource('Status', 'StatusController');
////Create Batches
Route::get('getDetailsOfAdmins', [BatchController::class, 'getDetailsOfAdmins'])->name('getDetailsOfAdmins');
Route::post('updatebatch', [BatchController::class, 'updatebatch'])->name('updatebatch');
Route::post('createbatch', [BatchController::class, 'createbatch'])->name('createbatch');
Route::post('destroybatch', [BatchController::class, 'destroybatch'])->name('destroybatch');
Route::post('currentBatch', [BatchController::class, 'currentBatch'])->name('currentBatch');
Route::resource('batch', 'BatchController');
////Generate daily teacher enabled attendance
Route::post('createDailyAttendanceForAllTeachers', [DailyTeacherAllocationController::class, 'createDailyAttendanceForAllTeachers'])->name('createDailyAttendanceForAllTeachers');
Route::resource('dailyTeacherAllocation', 'dailyTeacherAllocationController');

////Generate daily teacher enabled attendance for students
Route::get('indexstudentSubjectAttendance', [App\Http\Controllers\StudentSubjectAttendanceController::class, 'indexstudentSubjectAttendance'])->name('indexstudentSubjectAttendance');
Route::post('store', [App\Http\Controllers\StudentSubjectAttendanceController::class, 'storestudentSubjectAttendance'])->name('createStudentsDailyAttendance');
Route::post('storestudentSubjectAttendance', [App\Http\Controllers\StudentSubjectAttendanceController::class, 'storestudentSubjectAttendance'])->name('storestudentSubjectAttendance');
Route::put('updatestudentSubjectAttendance', [App\Http\Controllers\StudentSubjectAttendanceController::class, 'updatestudentSubjectAttendance'])->name('updatestudentSubjectAttendance');
Route::resource('studentSubjectAttendance', 'App\Http\Controllers\StudentSubjectAttendanceController');
////Hour creation and updation/////
Route::get('index', [AdminController::class, 'index'])->name('index');
Route::post('updateHourName', [AdminController::class, 'updateHourName'])->name('updateHourName');
Route::post('deleteHour', [AdminController::class, 'deleteHour'])->name('deleteHour');
Route::post('addHourName', [AdminController::class, 'addHourName'])->name('addHourName');

////Day creation and updation/////
Route::post('addDayName', [AdminController::class, 'addDayName'])->name('addDayName');
Route::post('updateDayName', [AdminController::class, 'updateDayName'])->name('updateDayName');
Route::post('deleteDay', [AdminController::class, 'deleteDay'])->name('deleteDay');
Route::resource('admin', 'AdminController');


/////Attendance/////////

Route::post('setCurrentHour', [HoursController::class, 'setCurrentHour'])->name('setCurrentHour');


Route::post('showDaysAbsentees', [AttendenceController::class, 'showDaysAbsentees'])->name('showAbsenteesOn');
Route::post('showAbsenteesBetweenDays', [AttendenceController::class, 'showAbsenteesBetweenDays'])->name('showAbsenteesBetween');




Route::post('deleteTodaysAttendenceForAllTeachers', [AttendenceController::class, 'deleteTodaysAttendenceForAllTeachers'])->name('deleteTodaysAttendenceForAllTeachers');
Route::post('deleteTodaysAttendenceForAllAdmins', [AttendenceController::class, 'deleteTodaysAttendenceForAllAdmins'])->name('deleteTodaysAttendenceForAllAdmins');
Route::post('deleteTodaysAttendenceForAllStudents', [AttendenceController::class, 'deleteTodaysAttendenceForAllStudents'])->name('deleteTodaysAttendenceForAllStudents');
Route::post('deleteTodaysAttendenceForAllStudentsByTeacher', [AttendenceController::class, 'deleteTodaysAttendenceForAllStudentsByTeacher'])->name('deleteTodaysAttendenceForAllStudentsByTeacher');
Route::post('showTodaysAbsentees', [AttendenceController::class, 'showTodaysAbsentees'])->name('showTodaysAbsentees');
Route::post('markTodaysAttendance', [AttendenceController::class, 'markTodaysAttendance'])->name('markTodaysAttendance');
Route::post('markTodaysAttendanceStudent', [AttendenceController::class, 'markTodaysAttendanceStudent'])->name('markTodaysAttendanceStudent');
Route::post('resetTodaysAttendance', [AttendenceController::class, 'resetTodaysAttendance'])->name('resetTodaysAttendance');
Route::post('adminCreateAttendance', [AttendenceController::class, 'adminCreateAttendance'])->name('createAttendance');
Route::post('adminSubmitTodaysAttendance', [AttendenceController::class, 'adminSubmitTodaysAttendance'])->name('submitTodaysAttendance');
Route::resource('attendence', 'AttendenceController');
////ClassRoom///////////

Route::get('gatherClassRoomCreateData', [ClassRoomController::class, 'gatherClassRoomCreateData'])->name('getAdminClassRoomDetails');
Route::post('updateClassroomStudent', [ClassRoomController::class, 'updateClassroomStudent'])->name('updateClassroomStudent');
Route::post('updateClassroomTeacherAndDescription', [ClassRoomController::class, 'updateClassroomTeacherAndDescription'])->name('updateClassroomTeacherAndDescription');
Route::post('assignClassroomStudent', [ClassRoomController::class, 'assignClassroomStudent'])->name('assignClassroomStudent');
Route::post('createclassRoom', [ClassRoomController::class, 'createclassRoom'])->name('createclassRoom');
Route::post('updateclassRoom', [ClassRoomController::class, 'updateclassRoom'])->name('updateclassRoom');
Route::post('destroyclassRoom', [ClassRoomController::class, 'destroyclassRoom'])->name('destroyclassRoom');
Route::resource('classRoom', 'ClassRoomController');
///Details/////

Route::get('getAdminAllDetails', [DetailController::class, 'getAdminAllDetails'])->name('getAdminAllDetails');
Route::post('store', [DetailController::class, 'store'])->name('store');
Route::post('updateAdminDetails', [DetailController::class, 'updateAdminDetails'])->name('updateAdminDetails');
Route::post('updateTeacherDetails', [DetailController::class, 'updateTeacherDetails'])->name('.updateTeacherDetails');
Route::post('updateStudentDetails', [DetailController::class, 'updateStudentDetails'])->name('updateStudentDetails');
Route::post('createTeacher', [DetailController::class, 'createTeacher'])->name('createTeacher');
Route::post('createStudentAdmin', [DetailController::class, 'createStudentAdmin'])->name('createStudentAdmin');
Route::post('createStudentTeacher', [DetailController::class, 'createStudentTeacher'])->name('createStudentTeacher');
Route::post('createAdmin', [DetailController::class, 'createAdmin'])->name('createAdmin');
Route::resource('detail', 'DetailController');
Route::post('deleteTeacherDetails', [DetailController::class, 'destroyTeacher'])->name('deleteTeacherDetails');
Route::post('deleteStudentDetails', [DetailController::class, 'destroyStudent'])->name('deleteStudentDetails');
Route::post('deleteAdminDetails', [DetailController::class, 'destroyAdmin'])->name('deleteAdminDetails');

///////Role////
Route::get('getRoleDetails', [RoleController::class,'getRoleDetails'])->name('getRoleDetails');
Route::post('createRole', [RoleController::class,'createRole'])->name('createRole');
Route::post('updateRole', [RoleController::class,'updateRole'])->name('updateRole');
Route::post('destroyRole', [RoleController::class,'destroyRole'])->name('destroyRole');
Route::resource('role', 'RoleController');
// Route::post('/destroyRole', [RoleController::class, 'destroy'])->name('deleteRoleByAdmin');
///////Section/////

Route::get('getDetails', [SectionController::class, 'getDetails'])->name('getSectionDetails');
Route::post('createSection', [SectionController::class, 'createSection'])->name('createSection');
Route::post('updateSection', [SectionController::class, 'updateSection'])->name('updateSection');
Route::post('destroySection', [SectionController::class, 'destroySection'])->name('destroySection');
Route::resource('section', 'SectionController');
/////Grade////////

Route::get('getGradeDetails', [GradeController::class, 'getGradeDetails'])->name('getGradeDetails');
Route::post('creategrade', [GradeController::class, 'creategrade'])->name('createGrade');
Route::post('updategrade', [GradeController::class, 'updategrade'])->name('updateGrade');
Route::post('destroygrade', [GradeController::class, 'destroygrade'])->name('destroyGrade');
Route::resource('Grade', 'GradeController');
////Department//////

Route::get('getDepartmentDetails', [DepartmentController::class, 'getDepartmentDetails'])->name('getDepartmentDetails');
Route::post('storeDepartment', [DepartmentController::class, 'storeDepartment'])->name('storeDepartment');
Route::post('editDepartment', [DepartmentController::class, 'editDepartment'])->name('editDepartment');
Route::post('destroyDepartment', [DepartmentController::class, 'destroyDepartment'])->name('destroyDepartment');
Route::resource('Department', 'DepartmentController');
////Subject//////

Route::get('index', [SubjectController::class, 'index'])->name('subjectIndex');
Route::post('getDepartmentFromGradeForSubject', [SubjectController::class, 'getDepartmentFromGradeForSubject'])->name('getDepartmentFromGradeForSubject');
Route::post('storeSubject', [SubjectController::class, 'storeSubject'])->name('storeSubject');
Route::post('updatesubject', [SubjectController::class, 'updatesubject'])->name('updatesubject');
Route::post('destroysubject', [SubjectController::class, 'destroysubject'])->name('destroysubject');
Route::resource('subject', 'SubjectController');
////Semester//////

Route::get('getSemesterDetails', [SemesterController::class, 'getSemesterDetails'])->name('getSemesterDetails');
Route::post('storesemester', [SemesterController::class, 'storesemester'])->name('storesemester');
Route::post('updatesemester', [SemesterController::class, 'updatesemester'])->name('updatesemester');
Route::resource('semester', 'SemesterController');
//////StudentMarks//////////

Route::post('updateMarksTeacher', [StudentMarksController::class, 'updateMarksTeacher'])->name('updateMarksTeacher');
Route::post('studentMarks.update', [StudentMarksController::class, 'update'])->name('updatecreateSubject');
Route::post('studentMarks.update', [StudentMarksController::class, 'update'])->name('adminStudentAddStudentMarks');
Route::post('deleteMarkEntry', [StudentMarksController::class, 'deleteMarkEntry'])->name('deleteMarksEntryAdmin');
Route::post('createMarkEntry', [StudentMarksController::class, 'createMarkEntry'])->name('createMarkEntry');
Route::post('destroy', [StudentMarksController::class, 'destroy'])->name('deleteStudentMarks');

////////Print MarkSheet///////////
Route::post('printMarksheetStudentByAdmin', [StudentMarksController::class, 'printMarksheetStudentByAdmin'])->name('studentMarks.printMarksheetStudentByAdmin');
Route::resource('studentMarks', 'StudentMarksController');


Route::get('/loginpage', function () {
    return view('auth.login');
})->name('loginpage');


Route::get('/registerpage', function () {
    return view('auth.register');
})->name('registerpage');

Route::get('register', function () {
    return view('auth.register');
})->name('registerpage');


Route::get('logout', [DashboardController::class,'logout'])->name('logout');
Route::get('dashboard', [DashboardController::class, 'chooseDashboard'])->name('selectDashboard');
Route::get('guestDashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/Admindashboard',function () {
//     return view('Admin.dashboard');
// })->middleware(['auth', 'verified'])->name('Admindashboard');
Route::get('Admindashboard', function () {

    $currentBatchId = 1; // example value

    return view('Admin.dashboard', compact('currentBatchId'));

})->middleware(['auth','verified'])->name('Admindashboard');
Route::get('Teacherdashboard', function () {
    return view('Teacher.dashboard');
})->middleware(['auth', 'verified'])->name('Teacherdashboard');
Route::get('Studentdashboard', function () {
    return view('Student.dashboard');
})->middleware(['auth', 'verified'])->name('Studentdashboard');

Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/////Admin Pages/////////////////////////////////////

Route::any('Admin', function () {
    return view('Admin.admin');
})->middleware(['auth', 'verified'])->name('Admin');
Route::any('AdminAttendance', function () {
    return view('Admin.attendance');
})->middleware(['auth', 'verified'])->name('AdminAttendance');
Route::any('AdminClassRoom', function () {
    return view('Admin.classRoom');
})->middleware(['auth', 'verified'])->name('AdminClassRoom');
Route::any('AdminDetails', function () {
    return view('Admin.details');
})->middleware(['auth', 'verified'])->name('AdminDetails');
Route::any('AdminGrade', function () {
    return view('Admin.grade');
})->middleware(['auth', 'verified'])->name('AdminGrade');
Route::any('AdminRole', function () {
    return view('Admin.role');
})->middleware(['auth', 'verified'])->name('AdminRole');
Route::any('AdminSection', function () {
    return view('Admin.section');
})->middleware(['auth', 'verified'])->name('AdminSection');
Route::any('AdminStudent', function () {
    return view('Admin.student');
})->middleware(['auth', 'verified'])->name('AdminStudent');
Route::any('AdminSubject',function () {
    return view('Admin.subject');
})->middleware(['auth', 'verified'])->name('AdminSubject');
Route::any('AdminTeacher', function () {
    return view('Admin.teacher');
})->middleware(['auth', 'verified'])->name('AdminTeacher');
Route::any('subjectTeachersForEachSection', function () {
    return view('Admin.subjectTeachersForEachSection');
})->middleware(['auth', 'verified'])->name('AdminSubjectTeachersForEachSection');

////Teacher Pages ///////////

Route::any('TeacherAttendance', function () {
    return view('Teacher.attendance');
})->middleware(['auth', 'verified'])->name('TeacherAttendance');
Route::any('TeacherDetails', function () {
    return view('Teacher.details');
})->middleware(['auth', 'verified'])->name('TeacherDetails');
Route::any('TeacherStudent', function () {
    return view('Teacher.student');
})->middleware(['auth', 'verified'])->name('TeacherStudent');
Route::any('TeacherSubject', function () {
    return view('Teacher.subject');
})->middleware(['auth', 'verified'])->name('TeacherSubject');

////Student Pages///////////

Route::any('StudentDashboard', function () {
    return view('Student.dashboard');
})->middleware(['auth', 'verified'])->name('StudentDashboard');
Route::any('teachersDetails', function () {
    return view('Student.teachersDetails');
})->middleware(['auth', 'verified'])->name('StudentTeachersDetails');
Route::any('StudentAttendance', function () {
    return view('Student.attendance');
})->middleware(['auth', 'verified'])->name('StudentAttendance');
Route::any('StudentMarks', function () {
    return view('Student.mark');
})->middleware(['auth', 'verified'])->name('StudentMarks');
Route::any('StudentDetails', function () {
    return view('Student.details');
})->middleware(['auth', 'verified'])->name('StudentDetails');

////////////Logout/////////////

require __DIR__.'/auth.php';
