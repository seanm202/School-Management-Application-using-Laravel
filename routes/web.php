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

Route::get('/get-pdf/{studentId}',[DomPdfController::class,'getPdf'])->name('getPdf');
Route::post('users/view-pdf', [HomeController::class, 'viewPDF'])->name('view-pdf');
Route::post('users/download-pdf', [HomeController::class, 'downloadPDF'])->name('download-pdf');
// Route::get('/', [ProjectController::class, 'index']);

Route::resource('projects', ProjectController::class);

Route::get('/', function () {
    return view('welcome');
});

//////Create timetable//////
Route::post('Timetable.generateTimetable', [TimetableController::class, 'generateTimetable'])->name('Timetable.generateTimetable');
////////////Add Priority/////////

Route::post('priority.createPriority', [PriorityController::class, 'createPriority'])->name('priority.createPriority');
Route::post('priority.editPriority', [PriorityController::class, 'updatePriority'])->name('priority.editPriority');
////Assign teachers of subjects to various classes
/////SubjectTeacherForEachSectionsController////
Route::get('SubjectTeacherForEachSections.getDetailsOfSubjectTeacherForEachSections', [SubjectTeacherForEachSectionsController::class, 'getDetailsOfSubjectTeacherForEachSections'])->name('getDetailsOfSubjectTeacherForEachSections');
Route::post('SubjectTeacherForEachSections.TeacherForClassSubject', [SubjectTeacherForEachSectionsController::class, 'TeacherForClassSubject'])->name('SubjectTeacherForEachSections.TeacherForClassSubject');
Route::post('SubjectTeacherForEachSections.deleteEntryTeacher', [SubjectTeacherForEachSectionsController::class, 'deleteEntryTeacher'])->name('SubjectTeacherForEachSections.deleteEntryTeacher');
Route::post('SubjectTeacherForEachSections.updateTeacherForClassSubject', [SubjectTeacherForEachSectionsController::class, 'updateTeacherForClassSubject'])->name('SubjectTeacherForEachSections.updateTeacherForClassSubject');
Route::resource('SubjectTeacherForEachSections', 'SubjectTeacherForEachSectionsController');
//////Role creation////////

Route::get('getDetailsOfStatus', [StatusController::class, 'getDetailsOfStatus'])->name('Status.getDetailsOfStatus');
Route::post('createStatus', [StatusController::class, 'createStatus'])->name('Status.createStatus');
Route::post('updateStatus', [StatusController::class, 'updateStatus'])->name('Status.updateStatus');
Route::post('destroyStatus', [StatusController::class, 'destroyStatus'])->name('Status.destroyStatus');
Route::resource('Status', 'StatusController');
////Create Batches
Route::get('getDetailsOfAdmins', [BatchController::class, 'getDetailsOfAdmins'])->name('batch.getDetailsOfAdmins');
Route::post('updatebatch', [BatchController::class, 'updatebatch'])->name('batch.updatebatch');
Route::post('createbatch', [BatchController::class, 'createbatch'])->name('batch.createbatch');
Route::post('destroybatch', [BatchController::class, 'destroybatch'])->name('batch.destroybatch');
Route::post('currentBatch', [BatchController::class, 'currentBatch'])->name('batch.currentBatch');
Route::resource('batch', 'BatchController');
////Generate daily teacher enabled attendance
Route::post('createDailyAttendanceForAllTeachers', [DailyTeacherAllocationController::class, 'createDailyAttendanceForAllTeachers'])->name('dailyTeacherAllocation.createDailyAttendanceForAllTeachers');
Route::resource('dailyTeacherAllocation', 'dailyTeacherAllocationController');

////Generate daily teacher enabled attendance for students
Route::get('studentSubjectAttendance.indexstudentSubjectAttendance', [App\Http\Controllers\StudentSubjectAttendanceController::class, 'indexstudentSubjectAttendance'])->name('studentSubjectAttendance.indexstudentSubjectAttendance');
Route::post('studentSubjectAttendance.store', [App\Http\Controllers\StudentSubjectAttendanceController::class, 'storestudentSubjectAttendance'])->name('createStudentsDailyAttendance');
Route::post('studentSubjectAttendance.storestudentSubjectAttendance', [App\Http\Controllers\StudentSubjectAttendanceController::class, 'storestudentSubjectAttendance'])->name('studentSubjectAttendance.storestudentSubjectAttendance');
Route::put('studentSubjectAttendance.updatestudentSubjectAttendance', [App\Http\Controllers\StudentSubjectAttendanceController::class, 'updatestudentSubjectAttendance'])->name('studentSubjectAttendance.updatestudentSubjectAttendance');
Route::resource('studentSubjectAttendance', 'App\Http\Controllers\StudentSubjectAttendanceController');
////Hour creation and updation/////
Route::get('admin.index', [AdminController::class, 'index'])->name('admin.index');
Route::post('updateHourName', [AdminController::class, 'updateHourName'])->name('admin.updateHourName');
Route::post('deleteHour', [AdminController::class, 'deleteHour'])->name('admin.deleteHour');
Route::post('addHourName', [AdminController::class, 'addHourName'])->name('admin.addHourName');

////Day creation and updation/////
Route::post('addDayName', [AdminController::class, 'addDayName'])->name('admin.addDayName');
Route::post('updateDayName', [AdminController::class, 'updateDayName'])->name('admin.updateDayName');
Route::post('deleteDay', [AdminController::class, 'deleteDay'])->name('deleteDay');
Route::resource('admin', 'AdminController');


/////Attendance/////////

Route::post('hours.setCurrentHour', [HoursController::class, 'setCurrentHour'])->name('hours.setCurrentHour');


Route::post('attendence.showDaysAbsentees', [AttendenceController::class, 'showDaysAbsentees'])->name('showAbsenteesOn');
Route::post('attendence.showAbsenteesBetweenDays', [AttendenceController::class, 'showAbsenteesBetweenDays'])->name('showAbsenteesBetween');




Route::post('deleteTodaysAttendenceForAllTeachers', [AttendenceController::class, 'deleteTodaysAttendenceForAllTeachers'])->name('attendence.deleteTodaysAttendenceForAllTeachers');
Route::post('deleteTodaysAttendenceForAllAdmins', [AttendenceController::class, 'deleteTodaysAttendenceForAllAdmins'])->name('attendence.deleteTodaysAttendenceForAllAdmins');
Route::post('deleteTodaysAttendenceForAllStudents', [AttendenceController::class, 'deleteTodaysAttendenceForAllStudents'])->name('attendence.deleteTodaysAttendenceForAllStudents');
Route::post('deleteTodaysAttendenceForAllStudentsByTeacher', [AttendenceController::class, 'deleteTodaysAttendenceForAllStudentsByTeacher'])->name('attendence.deleteTodaysAttendenceForAllStudentsByTeacher');
Route::post('showTodaysAbsentees', [AttendenceController::class, 'showTodaysAbsentees'])->name('showTodaysAbsentees');
Route::post('markTodaysAttendance', [AttendenceController::class, 'markTodaysAttendance'])->name('attendence.markTodaysAttendance');
Route::post('markTodaysAttendanceStudent', [AttendenceController::class, 'markTodaysAttendanceStudent'])->name('attendence.markTodaysAttendanceStudent');
Route::post('resetTodaysAttendance', [AttendenceController::class, 'resetTodaysAttendance'])->name('resetTodaysAttendance');
Route::post('adminCreateAttendance', [AttendenceController::class, 'adminCreateAttendance'])->name('createAttendance');
Route::post('adminSubmitTodaysAttendance', [AttendenceController::class, 'adminSubmitTodaysAttendance'])->name('submitTodaysAttendance');
Route::resource('attendence', 'AttendenceController');
////ClassRoom///////////

Route::get('classRoom.gatherClassRoomCreateData', [ClassRoomController::class, 'gatherClassRoomCreateData'])->name('getAdminClassRoomDetails');
Route::post('classRoom.updateClassroomStudent', [ClassRoomController::class, 'updateClassroomStudent'])->name('classRoom.updateClassroomStudent');
Route::post('classRoom.updateClassroomTeacherAndDescription', [ClassRoomController::class, 'updateClassroomTeacherAndDescription'])->name('classRoom.updateClassroomTeacherAndDescription');
Route::post('classRoom.assignClassroomStudent', [ClassRoomController::class, 'assignClassroomStudent'])->name('classRoom.assignClassroomStudent');
Route::post('classRoom.createclassRoom', [ClassRoomController::class, 'createclassRoom'])->name('classRoom.createclassRoom');
Route::post('classRoom.updateclassRoom', [ClassRoomController::class, 'updateclassRoom'])->name('classRoom.updateclassRoom');
Route::post('classRoom.destroyclassRoom', [ClassRoomController::class, 'destroyclassRoom'])->name('classRoom.destroyclassRoom');
Route::resource('classRoom', 'ClassRoomController');
///Details/////

Route::get('getAdminAllDetails', [DetailController::class, 'getAdminAllDetails'])->name('detail.getAdminAllDetails');
Route::post('store', [DetailController::class, 'store'])->name('detail.store');
Route::post('updateAdminDetails', [DetailController::class, 'updateAdminDetails'])->name('detail.updateAdminDetails');
Route::post('updateTeacherDetails', [DetailController::class, 'updateTeacherDetails'])->name('detail.updateTeacherDetails');
Route::post('updateStudentDetails', [DetailController::class, 'updateStudentDetails'])->name('detail.updateStudentDetails');
Route::post('createTeacher', [DetailController::class, 'createTeacher'])->name('detail.createTeacher');
Route::post('createStudentAdmin', [DetailController::class, 'createStudentAdmin'])->name('detail.createStudentAdmin');
Route::post('createStudentTeacher', [DetailController::class, 'createStudentTeacher'])->name('detail.createStudentTeacher');
Route::post('createAdmin', [DetailController::class, 'createAdmin'])->name('detail.createAdmin');
Route::resource('detail', 'DetailController');
Route::post('deleteTeacherDetails', [DetailController::class, 'destroyTeacher'])->name('detail.deleteTeacherDetails');
Route::post('deleteStudentDetails', [DetailController::class, 'destroyStudent'])->name('detail.deleteStudentDetails');
Route::post('deleteAdminDetails', [DetailController::class, 'destroyAdmin'])->name('detail.deleteAdminDetails');

///////Role////
Route::get('getRoleDetails', [RoleController::class,'getRoleDetails'])->name('getRoleDetails');
Route::post('createRole', [RoleController::class,'createRole'])->name('role.createRole');
Route::post('updateRole', [RoleController::class,'updateRole'])->name('role.updateRole');
Route::post('destroyRole', [RoleController::class,'destroyRole'])->name('role.destroyRole');
Route::resource('role', 'RoleController');
// Route::post('/destroyRole', [RoleController::class, 'destroy'])->name('deleteRoleByAdmin');
///////Section/////

Route::get('getDetails', [SectionController::class, 'getDetails'])->name('getSectionDetails');
Route::post('createSection', [SectionController::class, 'createSection'])->name('section.createSection');
Route::post('updateSection', [SectionController::class, 'updateSection'])->name('section.updateSection');
Route::post('destroySection', [SectionController::class, 'destroySection'])->name('section.destroySection');
Route::resource('section', 'SectionController');
/////Grade////////

Route::get('getGradeDetails', [GradeController::class, 'getGradeDetails'])->name('Grade.getGradeDetails');
Route::post('creategrade', [GradeController::class, 'creategrade'])->name('Grade.createGrade');
Route::post('updategrade', [GradeController::class, 'updategrade'])->name('Grade.updateGrade');
Route::post('destroygrade', [GradeController::class, 'destroygrade'])->name('Grade.destroyGrade');
Route::resource('Grade', 'GradeController');
////Department//////

Route::get('getDepartmentDetails', [DepartmentController::class, 'getDepartmentDetails'])->name('getDepartmentDetails');
Route::post('storeDepartment', [DepartmentController::class, 'storeDepartment'])->name('Department.storeDepartment');
Route::post('editDepartment', [DepartmentController::class, 'editDepartment'])->name('Department.editDepartment');
Route::post('destroyDepartment', [DepartmentController::class, 'destroyDepartment'])->name('Department.destroyDepartment');
Route::resource('Department', 'DepartmentController');
////Subject//////

Route::get('subject.index', [SubjectController::class, 'index'])->name('subjectIndex');
Route::post('subject.getDepartmentFromGradeForSubject', [SubjectController::class, 'getDepartmentFromGradeForSubject'])->name('subject.getDepartmentFromGradeForSubject');
Route::post('subject.storeSubject', [SubjectController::class, 'storeSubject'])->name('subject.storeSubject');
Route::post('subject.updatesubject', [SubjectController::class, 'updatesubject'])->name('subject.updatesubject');
Route::post('subject.destroysubject', [SubjectController::class, 'destroysubject'])->name('subject.destroysubject');
Route::resource('subject', 'SubjectController');
////Semester//////

Route::get('getSemesterDetails', [SemesterController::class, 'getSemesterDetails'])->name('getSemesterDetails');
Route::post('storesemester', [SemesterController::class, 'storesemester'])->name('semester.storesemester');
Route::post('updatesemester', [SemesterController::class, 'updatesemester'])->name('semester.updatesemester');
Route::resource('semester', 'SemesterController');
//////StudentMarks//////////

Route::post('studentMarks.updateMarksTeacher', [StudentMarksController::class, 'updateMarksTeacher'])->name('studentMarks.updateMarksTeacher');
Route::post('studentMarks.update', [StudentMarksController::class, 'update'])->name('studentMarks.updatecreateSubject');
Route::post('studentMarks.update', [StudentMarksController::class, 'update'])->name('studentMarks.adminStudentAddStudentMarks');
Route::post('studentMarks.deleteMarkEntry', [StudentMarksController::class, 'deleteMarkEntry'])->name('studentMarks.deleteMarksEntryAdmin');
Route::post('studentMarks.createMarkEntry', [StudentMarksController::class, 'createMarkEntry'])->name('studentMarks.createMarkEntry');
Route::post('studentMarks.destroy', [StudentMarksController::class, 'destroy'])->name('deleteStudentMarks');

////////Print MarkSheet///////////
Route::post('studentMarks.printMarksheetStudentByAdmin', [StudentMarksController::class, 'printMarksheetStudentByAdmin'])->name('studentMarks.printMarksheetStudentByAdmin');
Route::resource('studentMarks', 'StudentMarksController');


Route::get('/login', function () {
    return view('/auth/login');
})->name('loginpage');


Route::get('/register', function () {
    return view('/auth/register');
})->name('registerpage');


Route::get('/logout', [DashboardController::class,'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'chooseDashboard'])->name('selectDashboard');
Route::get('/guestDashboard', function () {
    return view('/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/Admindashboard',function () {
    return view('/Admin/dashboard');
})->middleware(['auth', 'verified'])->name('Admindashboard');
Route::get('/Teacherdashboard', function () {
    return view('/Teacher/dashboard');
})->middleware(['auth', 'verified'])->name('Teacherdashboard');
Route::get('/Studentdashboard', function () {
    return view('/Student/dashboard');
})->middleware(['auth', 'verified'])->name('Studentdashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/////Admin Pages/////////////////////////////////////

Route::any('/Admin', function () {
    return view('/Admin/admin');
})->middleware(['auth', 'verified'])->name('Admin');
Route::any('/AdminAttendance', function () {
    return view('/Admin/attendance');
})->middleware(['auth', 'verified'])->name('AdminAttendance');
Route::any('/AdminClassRoom', function () {
    return view('/Admin/classRoom');
})->middleware(['auth', 'verified'])->name('AdminClassRoom');
Route::any('/AdminDetails', function () {
    return view('/Admin/details');
})->middleware(['auth', 'verified'])->name('AdminDetails');
Route::any('/AdminGrade', function () {
    return view('/Admin/grade');
})->middleware(['auth', 'verified'])->name('AdminGrade');
Route::any('/AdminRole', function () {
    return view('/Admin/role');
})->middleware(['auth', 'verified'])->name('AdminRole');
Route::any('/AdminSection', function () {
    return view('/Admin/section');
})->middleware(['auth', 'verified'])->name('AdminSection');
Route::any('/AdminStudent', function () {
    return view('/Admin/student');
})->middleware(['auth', 'verified'])->name('AdminStudent');
Route::any('/AdminSubject',function () {
    return view('/Admin/subject');
})->middleware(['auth', 'verified'])->name('AdminSubject');
Route::any('/AdminTeacher', function () {
    return view('/Admin/teacher');
})->middleware(['auth', 'verified'])->name('AdminTeacher');
Route::any('/subjectTeachersForEachSection', function () {
    return view('/Admin/subjectTeachersForEachSection');
})->middleware(['auth', 'verified'])->name('AdminSubjectTeachersForEachSection');

////Teacher Pages ///////////


// Route::get('/Teacher', function () {
//     return view('/Teacher/admin');
// })->middleware(['auth', 'verified'])->name('Teacher');
Route::any('/TeacherAttendance', function () {
    return view('/Teacher/attendance');
})->middleware(['auth', 'verified'])->name('TeacherAttendance');
Route::any('/TeacherDetails', function () {
    return view('/Teacher/details');
})->middleware(['auth', 'verified'])->name('TeacherDetails');
Route::any('/TeacherStudent', function () {
    return view('/Teacher/student');
})->middleware(['auth', 'verified'])->name('TeacherStudent');
Route::any('/TeacherSubject', function () {
    return view('/Teacher/subject');
})->middleware(['auth', 'verified'])->name('TeacherSubject');

////Student Pages///////////

Route::any('/StudentDashboard', function () {
    return view('/Student/dashboard');
})->middleware(['auth', 'verified'])->name('StudentDashboard');
Route::any('/teachersDetails', function () {
    return view('/Student/teachersDetails');
})->middleware(['auth', 'verified'])->name('StudentTeachersDetails');
Route::any('/StudentAttendance', function () {
    return view('/Student/attendance');
})->middleware(['auth', 'verified'])->name('StudentAttendance');
Route::any('/StudentMarks', function () {
    return view('/Student/mark');
})->middleware(['auth', 'verified'])->name('StudentMarks');
Route::any('/StudentDetails', function () {
    return view('/Student/details');
})->middleware(['auth', 'verified'])->name('StudentDetails');

////////////Logout/////////////

require __DIR__.'/auth.php';
