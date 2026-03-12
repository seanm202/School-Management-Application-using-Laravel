//Add admin
  $(function () {

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });


    $('#addAdminButton').click(function (e) {
e.preventDefault();
var createAdminUrl =$('#FormAddAdminAdmin').attr('action');
$.ajax({
data: $('#FormAddAdminAdmin').serialize(),
url: createAdminUrl,
type: "POST",
dataType: 'json',
success: function (data) {
alert('Success');
},
error: function (xhr) {
console.log(xhr.responseText); // 🔥 very useful
alert('Error');
}
});
});

  });
//
//
//

  $(function () {

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });


    $('#updateBatch').click(function (e) {
e.preventDefault();
var updateBatchForm = $('#updateBatches').attr('action');
console.log(updateBatchForm);
$.ajax({
data: $('#updateBatches').serialize(),
url: updateBatchForm,
type: "POST",
dataType: 'json',
success: function (data) {
alert('Success');
},
error: function (xhr) {
console.log(xhr.responseText); // 🔥 very useful
alert('Error');
}
});
});

  });

  //
  //
  //
  $(function () {

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });


    $('#assignCurrentBatch').click(function (e) {
e.preventDefault();
var assignCurrentBatches = $('#currentBatch').attr('action');
$.ajax({
data: $('#currentBatch').serialize(),
url: assignCurrentBatches,
type: "POST",
dataType: 'json',
success: function (data) {
alert('Success');
},
error: function (xhr) {
console.log(xhr.responseText); // 🔥 very useful
alert('Error');
}
});
});

  });

    //
    //
    //
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });


      $('#createBatchButton').click(function (e) {
  e.preventDefault();
  var assignCreateBatch = $('#createBatches').attr('action');
  $.ajax({
  data: $('#createBatches').serialize(),
  url: assignCreateBatch,
  type: "POST",
  dataType: 'json',
  success: function (data) {
  alert('Success');
  },
  error: function (xhr) {
  console.log(xhr.responseText); // 🔥 very useful
  alert('Error');
  }
  });
  });

    });


      //
      //
      //
      $(function () {

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });


        $('#createDepartmentButton').click(function (e) {
    e.preventDefault();
    var createDepartment = $('#createDepartment').attr('action');
    $.ajax({
    data: $('#createDepartment').serialize(),
    url: createDepartment,
    type: "POST",
    dataType: 'json',
    success: function (data) {
    alert('Success');
    },
    error: function (xhr) {
    console.log(xhr.responseText); // 🔥 very useful
    alert('Error');
    }
    });
    });

      });



        //
        //
        //
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });


          $('#saveEditDepartment').click(function (e) {
      e.preventDefault();
      var updateDepartment = $('#updateDepartment').attr('action');
      $.ajax({
      data: $('#updateDepartment').serialize(),
      url: updateDepartment,
      type: "POST",
      dataType: 'json',
      success: function (data) {
      alert('Success');
      },
      error: function (xhr) {
      console.log(xhr.responseText); // 🔥 very useful
      alert('Error');
      }
      });
      });

        });

                //
                //
                //
                $(function () {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                  });


                  $('#removeDepartment').click(function (e) {
              e.preventDefault();
              var deleteDepartment = $('#deleteDepartment').attr('action');
              $.ajax({
              data: $('#deleteDepartment').serialize(),
              url: deleteDepartment,
              type: "POST",
              dataType: 'json',
              success: function (data) {
              alert('Success');
              },
              error: function (xhr) {
              console.log(xhr.responseText); // 🔥 very useful
              alert('Error');
              }
              });
              });

                });


                                //
                                //
                                //
                                $(document).ready(function () {

                                  $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                    // ✅ delegated event (works for all rows)
                                    $(document).on('click', '.saveSemesterDetails', function (e) {
                                      e.preventDefault();

                                      var form = $(this).closest('form');
                                      console.log(form.serialize());

                                      var url = form.attr('action');
                                      console.log(url);
                                      $.ajax({
                                          url: url,
                                          type: "POST",
                                          data: form.serialize(),
                                          dataType: 'json',
                                          success: function (data) {
                                              console.log("SUCCESS FIRED");
                                              console.log(data);
                                              alert("Updated!");
                                          },
                                          error: function (xhr) {
                                              console.log(xhr.status);
                                              console.log(xhr.responseText);
                                          }
                                      });
                                  });
                                });



                                                                //
                                                                //
                                                                //
      $(function () {

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });


        $('#addSemester').click(function (e) {
    e.preventDefault();
    var createSemester = $('#createSemester').attr('action');
    $.ajax({
    data: $('#createSemester').serialize(),
    url: createSemester,
    type: "POST",
    dataType: 'json',
    success: function (data) {
    alert('Success');
    },
    error: function (xhr) {
    console.log(xhr.responseText);
    alert('Error');
    }
                                    });
                                    });

                                      });



    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });


      $('#addDay').click(function (e) {
  e.preventDefault();
  var createDay = $('#createDay').attr('action');
  $.ajax({
  data: $('#createDay').serialize(),
  url: createDay,
  type: "POST",
  dataType: 'json',
  success: function (data) {
  alert('Success');
  },
  error: function (xhr) {
  console.log(xhr.responseText);
  }
                                  });
                                  });

                                    });



                                    $(document).ready(function () {

                                      $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                        // ✅ delegated event (works for all rows)
                                        $(document).on('click', '.saveDayDetails', function (e) {
                                          e.preventDefault();

                                          var form = $(this).closest('form');
                                          console.log(form.length);
                                          console.log(form.serialize());

                                          var url = form.attr('action');
                                          console.log(url);
                                          $.ajax({
                                              url: url,
                                              type: "POST",
                                              data: form.serialize(),
                                              dataType: 'json',
                                              success: function (data) {
                                                  console.log("SUCCESS FIRED");
                                                  console.log(data);
                                                  alert("Updated!");
                                              },
                                              error: function (xhr) {
                                                  console.log(xhr.status);
                                                  console.log(xhr.responseText);
                                              }
                                          });
                                      });
                                    });


    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });


      $('#saveHourDetails').click(function (e) {
  e.preventDefault();
  var updateHourDetails = $('#updateHourDetails').attr('action');
  $.ajax({
  data: $('#updateHourDetails').serialize(),
  url: updateHourDetails,
  type: "POST",
  dataType: 'json',
  success: function (data) {
  alert('Success');
  },
  error: function (xhr) {
  console.log(xhr.responseText);
  }
                                  });
                                  });

                                    });


  $(function () {

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
  });

        $('#addHourButton').click(function (e) {
    e.preventDefault();
    var updateHourDetails = $('#createHour').attr('action');
    $.ajax({
    data: $('#createHour').serialize(),
    url: updateHourDetails,
    type: "POST",
    dataType: 'json',
    success: function (data) {
    alert('Success');
    },
    error: function (xhr) {
    console.log(xhr.responseText);
    }
                                    });
                                    });

                                      });


$(function () {

  $.ajaxSetup({
      headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

      $('#buttonForCreateDailyAttendance').click(function (e) {
  e.preventDefault();
        var forCreateDailyAttendance = $('#createDailyAttendance').attr('action');
    $.ajax({
      data: $('#createDailyAttendance').serialize(),
    url: forCreateDailyAttendance,
      type: "POST",
      dataType: 'json',
      success: function (data) {
      alert('Success');
        },
        error: function (xhr) {
        console.log(xhr.responseText);
      }
      });
        });
  });

  $(function () {

  $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                              });

                  $('#buttonFordDeleteTodaysAttendenceForAllTeachers').click(function (e) {
                  e.preventDefault();
                    var deleteTodaysAttendenceForAllTeachers = $('#deleteTodaysAttendenceForAllTeachers').attr('action');
        $.ajax({
              data: $('#deleteTodaysAttendenceForAllTeachers').serialize(),
        url: deleteTodaysAttendenceForAllTeachers,
  type: "POST",
  dataType: 'json',
        success: function (data) {
                      alert('Success');
        },
      error: function (xhr) {
    console.log(xhr.responseText);
        }
        });
          });
  });


  $(function () {

  $.ajaxSetup({
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                              });

                  $('#buttonForDeleteTodaysAttendanceForAllAdmins').click(function (e) {
                  e.preventDefault();
                    var deleteTodaysAttendanceForAllAdmins = $('#deleteTodaysAttendanceForAllAdmins').attr('action');
        $.ajax({
              data: $('#deleteTodaysAttendanceForAllAdmins').serialize(),
        url: deleteTodaysAttendanceForAllAdmins,
  type: "POST",
  dataType: 'json',
        success: function (data) {
                      alert('Success');
        },
      error: function (xhr) {
    console.log(xhr.responseText);
        }
        });
          });
  });

    $(function () {

    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                                });

                    $('#buttonForDeleteTodaysAttendenceForAllStudents').click(function (e) {
                    e.preventDefault();
                      var dodeleteTodaysAttendenceForAllStudents = $('#deleteTodaysAttendenceForAllStudents').attr('action');
          $.ajax({
                data: $('#deleteTodaysAttendenceForAllStudents').serialize(),
          url: dodeleteTodaysAttendenceForAllStudents,
    type: "POST",
    dataType: 'json',
          success: function (data) {
                        alert('Success');
          },
        error: function (xhr) {
      console.log(xhr.responseText);
          }
          });
            });
    });

        $(function () {

        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                                    });

                        $('#addStatus').click(function (e) {
                        e.preventDefault();
                          var urlstatusAddAdmin = $('#statusAddAdmin').attr('action');
              $.ajax({
                    data: $('#statusAddAdmin').serialize(),
              url: urlstatusAddAdmin,
        type: "POST",
        dataType: 'json',
              success: function (data) {
                            alert('Success');
              },
            error: function (xhr) {
          console.log(xhr.responseText);
              }
              });
                });
        });

//
//
//

        $(function () {

        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                                    });

                        $('#saveGrade').click(function (e) {
                        e.preventDefault();
                          var urlcreateGradeByAdmin = $('#createGradeByAdmin').attr('action');
              $.ajax({
                    data: $('#createGradeByAdmin').serialize(),
              url: urlcreateGradeByAdmin,
        type: "POST",
        dataType: 'json',
              success: function (data) {
                            alert('Success');
              },
            error: function (xhr) {
          console.log(xhr.responseText);
              }
              });
                });
        });

        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });


          $('#buttonForUpdateStatus').click(function (e) {
        e.preventDefault();
        var updateBatchForm = $('#updateStatusDetails').attr('action');
        console.log(updateBatchForm);
        $.ajax({
        data: $('#updateStatusDetails').serialize(),
        url: updateBatchForm,
        type: "POST",
        dataType: 'json',
        success: function (data) {
        alert('Success');
        },
        error: function (xhr) {
        console.log(xhr.responseText); // 🔥 very useful
        alert('Error');
        }
        });
        });

        });


        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });


          $('#buttonForStatusDelete').click(function (e) {
        e.preventDefault();
        var updateBatchForm = $('#deleteStatusDetails').attr('action');
        console.log(updateBatchForm);
        $.ajax({
        data: $('#deleteStatusDetails').serialize(),
        url: updateBatchForm,
        type: "POST",
        dataType: 'json',
        success: function (data) {
        alert('Success');
        },
        error: function (xhr) {
        console.log(xhr.responseText); // 🔥 very useful
        alert('Error');
        }
        });
        });

        });
