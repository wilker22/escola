<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\EmployeeRegController;
use App\Http\Controllers\Backend\Employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Student\StudentRegController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\UserController;
use App\Models\EmployeeSallaryLog;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


Route::group(['middleware' => 'auth'], function () {

    //Rotas de Gerenciamento de Usuários
    Route::prefix('users')->group(function () {
        Route::get('/view', [UserController::class, 'userView'])->name('user.view');
        Route::get('/add', [UserController::class, 'userAdd'])->name('user.add');
        Route::post('/store', [UserController::class, 'userStore'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'userEdit'])->name('user.edit');
        Route::post('/update/{id}', [UserController::class, 'userUpdate'])->name('user.update');
        Route::get('/delete/{id}', [UserController::class, 'userDestroy'])->name('user.delete');
    });

    //user profile and change password
    Route::prefix('profile')->group(function () {
        Route::get('/view', [ProfileController::class, 'profileView'])->name('profile.view');
        Route::get('/edit/', [ProfileController::class, 'profileEdit'])->name('profile.edit');
        Route::post('/store/', [ProfileController::class, 'profileStore'])->name('profile.store');
        Route::get('/password/view', [ProfileController::class, 'passwordView'])->name('password.view');
        Route::post('/password/update', [ProfileController::class, 'passwordUpdate'])->name('password.update');
    });

    //route setups
    Route::prefix('setups')->group(function () {
        //Student class routes
        Route::get('/student/class/view', [StudentClassController::class, 'viewStudent'])->name('student.class.view');
        Route::get('/student/class/add', [StudentClassController::class, 'studentClassAdd'])->name('student.class.add');
        Route::post('/student/class/store', [StudentClassController::class, 'studentClassStore'])->name('student.class.store');
        Route::get('/student/class/edit/{id}', [StudentClassController::class, 'studentClassEdit'])->name('student.class.edit');
        Route::post('/student/class/update/{id}', [StudentClassController::class, 'studentClassUpdate'])->name('student.class.update');
        Route::get('/student/class/delete/{id}', [StudentClassController::class, 'studentClassDelete'])->name('student.class.delete');

        //Student year routes
        Route::get('/student/year/view', [StudentYearController::class, 'viewYear'])->name('student.year.view');
        Route::get('/student/year/add', [StudentYearController::class, 'studentYearAdd'])->name('student.year.add');
        Route::post('/student/year/store', [StudentYearController::class, 'studentYearStore'])->name('student.year.store');
        Route::get('/student/year/edit/{id}', [StudentYearController::class, 'studentYearEdit'])->name('student.year.edit');
        Route::post('/student/year/update/{id}', [StudentYearController::class, 'studentYearUpdate'])->name('student.year.update');
        Route::get('/student/year/delete/{id}', [StudentYearController::class, 'studentYearDelete'])->name('student.year.delete');

        //Student groups routes
        Route::get('/student/group/view', [StudentGroupController::class, 'viewGroup'])->name('student.group.view');
        Route::get('/student/group/add', [StudentGroupController::class, 'studentGroupAdd'])->name('student.group.add');
        Route::post('/student/group/store', [StudentGroupController::class, 'studentGroupStore'])->name('student.group.store');
        Route::get('/student/group/edit/{id}', [StudentGroupController::class, 'studentGroupEdit'])->name('student.group.edit');
        Route::post('/student/group/update/{id}', [StudentGroupController::class, 'studentGroupUpdate'])->name('student.group.update');
        Route::get('/student/group/delete/{id}', [StudentGroupController::class, 'studentGroupDelete'])->name('student.group.delete');

        //Student shifts routes
        Route::get('/student/shift/view', [StudentShiftController::class, 'viewShift'])->name('student.shift.view');
        Route::get('/student/shift/add', [StudentShiftController::class, 'studentShiftAdd'])->name('student.shift.add');
        Route::post('/student/shift/store', [StudentShiftController::class, 'studentShiftStore'])->name('student.shift.store');
        Route::get('/student/shift/edit/{id}', [StudentShiftController::class, 'studentShiftEdit'])->name('student.shift.edit');
        Route::post('/student/shift/update/{id}', [StudentShiftController::class, 'studentShiftUpdate'])->name('student.shift.update');
        Route::get('/student/shift/delete/{id}', [StudentShiftController::class, 'studentShiftDelete'])->name('student.shift.delete');

        //Student fee category routes
        Route::get('/fee/category/view', [FeeCategoryController::class, 'viewFeeCat'])->name('fee.cat.view');
        Route::get('/fee/category/add', [FeeCategoryController::class, 'feeCatAdd'])->name('fee.cat.add');
        Route::post('/fee/category/store', [FeeCategoryController::class, 'feeCatStore'])->name('fee.cat.store');
        Route::get('/fee/category/edit/{id}', [FeeCategoryController::class, 'feeCatEdit'])->name('fee.cat.edit');
        Route::post('/fee/category/update/{id}', [FeeCategoryController::class, 'feeCatUpdate'])->name('fee.cat.update');
        Route::get('/fee/category/delete/{id}', [FeeCategoryController::class, 'feeCatDelete'])->name('fee.cat.delete');

        //Student fee  amount routes
        Route::get('/fee/amount/view', [FeeAmountController::class, 'viewFeeAmount'])->name('fee.amount.view');
        Route::get('/fee/amount/add', [FeeAmountController::class, 'feeAmountAdd'])->name('fee.amount.add');
        Route::post('/fee/amount/store', [FeeAmountController::class, 'feeAmountStore'])->name('fee.amount.store');
        Route::get('/fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'feeAmountEdit'])->name('fee.amount.edit');
        Route::post('/fee/amount/update/{id}', [FeeAmountController::class, 'feeAmountUpdate'])->name('fee.amount.update');
        Route::get('/fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'feeAmountDetails'])->name('fee.amount.details');

        //Exam types routes
        Route::get('/exam/type/view', [ExamTypeController::class, 'viewExamType'])->name('exam.type.view');
        Route::get('/exam/type/add', [ExamTypeController::class, 'examTypeAdd'])->name('exam.type.add');
        Route::post('/exam/type/store', [ExamTypeController::class, 'examTypeStore'])->name('exam.type.store');
        Route::get('/exam/type/edit/{id}', [ExamTypeController::class, 'examTypeEdit'])->name('exam.type.edit');
        Route::post('/exam/type/update/{id}', [ExamTypeController::class, 'examTypeUpdate'])->name('exam.type.update');
        Route::get('/exam/type/delete/{id}', [ExamTypeController::class, 'examTypeDelete'])->name('exam.type.delete');

        // School Subject All Routes 
        Route::get('school/subject/view', [SchoolSubjectController::class, 'viewSubject'])->name('school.subject.view');
        Route::get('school/subject/add', [SchoolSubjectController::class, 'subjectAdd'])->name('school.subject.add');
        Route::post('school/subject/store', [SchoolSubjectController::class, 'subjectStore'])->name('store.school.subject');
        Route::get('school/subject/edit/{id}', [SchoolSubjectController::class, 'subjectEdit'])->name('school.subject.edit');
        Route::post('school/subject/update/{id}', [SchoolSubjectController::class, 'subjectUpdate'])->name('update.school.subject');
        Route::get('school/subject/delete/{id}', [SchoolSubjectController::class, 'subjectDelete'])->name('school.subject.delete');

        //Assign Subects routes
        Route::get('/assign/subject/view', [AssignSubjectController::class, 'viewAssignSubject'])->name('assign.subject.view');
        Route::get('/assign/subject/add', [AssignSubjectController::class, 'assignSubjectAdd'])->name('assign.subject.add');
        Route::post('/assign/subject/store', [AssignSubjectController::class, 'assignSubjectStore'])->name('assign.subject.store');
        Route::get('/assign/subject/edit/{class_id}', [AssignSubjectController::class, 'assignSubjectEdit'])->name('assign.subject.edit');
        Route::post('/assign/subject/update/{class_id}', [AssignSubjectController::class, 'assignSubjectUpdate'])->name('assign.subject.update');
        Route::get('/assign/subject/details/{class_id}', [AssignSubjectController::class, 'assignSubjectDetails'])->name('assign.subject.details');

        //Working Designations routes
        Route::get('/designation/view', [DesignationController::class, 'viewDesignation'])->name('designation.view');
        Route::get('/designation/add', [DesignationController::class, 'designationAdd'])->name('designation.add');
        Route::post('/designation/store', [DesignationController::class, 'designationStore'])->name('designation.store');
        Route::get('/designation/edit/{id}', [DesignationController::class, 'designationEdit'])->name('designation.edit');
        Route::post('/designation/update/{id}', [DesignationController::class, 'designationUpdate'])->name('designation.update');
        Route::get('/designation/delete/{id}', [DesignationController::class, 'designationDelete'])->name('designation.delete');
    });

    //Student Registration routes
    Route::prefix('student')->group(function () {
        Route::get('/reg/view', [StudentRegController::class, 'studentRegView'])->name('student.registration.view');
        Route::get('/reg/add', [StudentRegController::class, 'studentRegAdd'])->name('student.registration.add');
        Route::get('/reg/edit/{student_id}', [StudentRegController::class, 'studentRegEdit'])->name('student.registration.edit');
        Route::get('/year/class/wise', [StudentRegController::class, 'studentYearClassWise'])->name('student.year.class.wise');
        Route::post('/reg/store/', [StudentRegController::class, 'studentRegStore'])->name('student.registration.store');
        Route::post('/reg/update/{student_id}', [StudentRegController::class, 'studentRegUpdate'])->name('student.registration.update');
        Route::get('/reg/promotion/{student_id}', [StudentRegController::class, 'studentRegPromotion'])->name('student.registration.promotion');
        Route::post('/reg/update/promotion/{student_id}', [StudentRegController::class, 'studentRegUpdatePromotion'])->name('student.registration.update.promotion');
        Route::get('/reg/details/{student_id}', [StudentRegController::class, 'studentRegDetails'])->name('student.registration.details');
        //student generate roll
        Route::get('/roll/generate/view', [StudentRollController::class, 'studentRollView'])->name('student.generate.roll');
        Route::get('/reg/getstudents', [StudentRollController::class, 'getStudents'])->name('student.registration.getstudents');
        Route::get('/roll/generate/store', [StudentRollController::class, 'studentsRollStore'])->name('roll.generate.store');


        //Registration Fee routes
        Route::get('/reg/fee/view', [RegistrationFeeController::class, 'regFeeView'])->name('registration.fee.view');
        Route::get('/reg/fee/classwisedata', [RegistrationFeeController::class, 'regFeeClassdata'])->name('student.registration.fee.classwise.get');
        Route::get('/reg/fee/payslip', [RegistrationFeeController::class, 'regFeePayslip'])->name('student.registration.fee.payslip');

        //Monthly Fee routes
        Route::get('/monthly/fee/view', [MonthlyFeeController::class, 'monthlyFeeView'])->name('monthly.fee.view');
        Route::get('/monthly/fee/classwisedata', [MonthlyFeeController::class, 'monthlyFeeClassData'])->name('student.monthly.fee.classwise.get');
        Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'monthlyFeePayslip'])->name('student.monthly.fee.payslip');

        //Exam Fee routes
        Route::get('/exam/fee/view', [ExamFeeController::class, 'examFeeView'])->name('exam.fee.view');
        Route::get('/exam/fee/classwisedata', [ExamFeeController::class, 'examFeeClassData'])->name('student.exam.fee.classwise.get');
        Route::get('/exam/fee/payslip', [ExamFeeController::class, 'examFeePayslip'])->name('student.exam.fee.payslip');
    });

    //Employee registration
    Route::prefix('employee')->group(function () {
        Route::get('reg/employee/view', [EmployeeRegController::class, 'employeeView'])->name('employee.view');
        Route::get('reg/employee/add', [EmployeeRegController::class, 'employeeAdd'])->name('employee.registration.add');
        Route::post('reg/employee/store', [EmployeeRegController::class, 'employeeStore'])->name('store.employee.registration');
        Route::get('reg/employee/edit/{id}', [EmployeeRegController::class, 'employeeEdit'])->name('edit.employe.registration');
        Route::post('reg/employee/update/{id}', [EmployeeRegController::class, 'employeeUpdate'])->name('update.employee.registration');
        Route::get('reg/employee/details/{id}', [EmployeeRegController::class, 'employeeDetails'])->name('details.employe.registration');

        //Salary
        Route::get('salary/employee/view', [EmployeeSalaryController::class, 'salaryView'])->name('employee.salary.view');
        Route::get('salary/employee/increment/{id}', [EmployeeSalaryController::class, 'salaryIncrement'])->name('employee.salary.increment');
        Route::post('salary/employee/store/{id}', [EmployeeSalaryController::class, 'salaryStore'])->name('employee.salary.store');

        //Leave
        Route::get('leave/employee/view', [EmployeeLeaveController::class, 'leaveView'])->name('employee.leave.view');
        Route::get('leave/employee/add', [EmployeeLeaveController::class, 'leaveAdd'])->name('employee.leave.add');
        Route::post('leave/employee/store', [EmployeeLeaveController::class, 'leaveStore'])->name('employee.leave.store');
        Route::get('leave/employee/edit/{id}', [EmployeeLeaveController::class, 'leaveEdit'])->name('employee.leave.edit');
        Route::post('leave/employee/update/{id}', [EmployeeLeaveController::class, 'leaveUpdate'])->name('employee.leave.update');
        Route::get('leave/employee/delete/{id}', [EmployeeLeaveController::class, 'leaveDelete'])->name('employee.leave.delete');
        
    });
});
