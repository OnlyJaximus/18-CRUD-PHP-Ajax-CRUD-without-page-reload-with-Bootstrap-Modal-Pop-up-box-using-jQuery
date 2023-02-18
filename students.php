<?php
require_once('dbconn.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- 
    RTL version https://alertifyjs.com/guide.html
    -->
    <!-- <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css" /> -->

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <title>Hello, world!</title>
</head>

<body>

    <!-- Modal Add Student -->
    <div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="saveStudent">
                    <div class="modal-body">

                        <div id="errorMessage" class="alert alert-warning d-none">

                        </div>

                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="">Course</label>
                            <input type="text" name="course" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Student -->
    <div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="updateStudent">
                    <div class="modal-body">

                        <div id="errorMessageUpdate" class="alert alert-warning d-none">

                        </div>

                        <!-- <input type="text" name="student_id" id="student_id"> -->
                        <input type="hidden" name="student_id" id="student_id">

                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="">Course</label>
                            <input type="text" name="course" id="course" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal View Student -->
    <div class="modal fade" id="studentViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body">

                    <div id="errorMessageUpdate" class="alert alert-warning d-none">

                    </div>

                    <!-- <input type="text" name="student_id" id="student_id"> -->
                    <input type="hidden" name="student_id" id="student_id">

                    <div class="mb-3">
                        <label for="">Name</label>
                        <p class="form-control" id="view_name"></p>
                    </div>

                    <div class="mb-3">
                        <label for="">Email</label>
                        <p class="form-control" id="view_email"></p>
                    </div>

                    <div class="mb-3">
                        <label for="">Phone</label>
                        <p class="form-control" id="view_phone"></p>
                    </div>

                    <div class="mb-3">
                        <label for="">Course</label>
                        <p class="form-control" id="view_course"></p>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>

            </div>
        </div>
    </div>



    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>PHP Ajax CRUD without page reload with Bootstrap Modal (Pop up box) using jQuery
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentAddModal">
                                Add Student
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM students_crud";
                                $query_run = mysqli_query($mysqli, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $student) {
                                ?>
                                        <tr>
                                            <td><?php echo $student['id'] ?></td>
                                            <td><?php echo $student['name'] ?></td>
                                            <td><?php echo $student['email'] ?></td>
                                            <td><?php echo $student['phone'] ?></td>
                                            <td><?php echo $student['course'] ?></td>
                                            <td>
                                                <button type="button" value="<?php echo $student['id']; ?>" class="viewStudentBtn btn btn-info">View</button>
                                                <button type="button" value="<?php echo $student['id']; ?>" class="editStudentBtn btn btn-success">Edit</button>
                                                <button type="button" value="<?php echo $student['id']; ?>" class="deleteStudentBtn btn btn-danger">Delete</button>
                                            </td>
                                        </tr>

                                <?php
                                    }
                                }

                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- https://releases.jquery.com/ -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


    <!-- JavaScript  https://alertifyjs.com/guide.html -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>



    <!--  form id = saveStudent -->
    <script>
        // ***********************  Dodavanje studenta ***********************
        $(document).on('submit', '#saveStudent', function(e) {

            e.preventDefault();

            var formData = new FormData(this); // this means we are submitting the form (all form input wi weill get it)
            formData.append("save_student", true);

            // jqajax
            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    var res = jQuery.parseJSON(response);

                    if (res.status == 422) {
                        //  32 linija koda
                        $('#errorMessage').removeClass('d-none'); // d-none klasa koju smo dodelili divu na liniji koda 27
                        $('#errorMessage').text(res.message);

                    } else if (res.status == 200) {

                        $('#errorMessage').addClass('d-none'); // d-none klasa koju smo dodelili divu na liniji koda 27
                        $("#studentAddModal").modal('hide'); // studentAddModal linija koda  17
                        $('#saveStudent')[0].reset();

                        // alertify.success('Current position : ' + alertify.get('notifier', 'position'));  // https://alertifyjs.com/notifier/position.html
                        // alertify.set('notifier', 'position', 'bottom-right');

                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);

                        // za refreshovanje tabele a ne cele stranice  nakon dodavanja studenta
                        // Mora obavezno space " #myTable"; !!!!!!!!!
                        $('#myTable').load(location.href + " #myTable"); // myTable (id na liniji koda 80) 
                    }


                }
            });

        });



        // *********************** Editovanje studenta   (.editStudentBtn na liniji koda 107) ***********************
        $(document).on('click', '.editStudentBtn', function() {
            var student_id = $(this).val();
            // alert(student_id);  // test

            // jqAjax
            $.ajax({
                type: "GET",
                url: "code.php?student_id=" + student_id,
                success: function(response) {

                    var res = jQuery.parseJSON(response);

                    if (res.status == 422) {
                        alert(res.message);

                    } else if (res.status == 200) {
                        $('#student_id').val(res.data.id);
                        $('#name').val(res.data.name);
                        $('#email').val(res.data.email);
                        $('#phone').val(res.data.phone);
                        $('#course').val(res.data.course);

                        $("#studentEditModal").modal('show');

                    }

                }
            });
        });

        // *********************** Sacuvavanje Studenta ***********************
        $(document).on('submit', '#updateStudent', function(e) {

            e.preventDefault();

            var formData = new FormData(this); // this means we are submitting the form (all form input wi weill get it)
            formData.append("update_student", true);

            // jqajax
            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    var res = jQuery.parseJSON(response);

                    if (res.status == 422) {

                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);

                    } else if (res.status == 200) {

                        $('#errorMessageUpdate').addClass('d-none');

                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);

                        $("#studentEditModal").modal('hide'); // modal se zatvara
                        $('#updateStudent')[0].reset(); // #updateStudent (je form id, linija koda  75. sva polja se resetuju)


                        // za refreshovanje tabele a ne cele stranice  nakon dodavanja studenta
                        // Mora obavezno space " #myTable"; !!!!!!!!!
                        $('#myTable').load(location.href + " #myTable"); // myTable (id na liniji koda 80) 
                    }


                }
            });

        });


        //  *********************** Pregled studenta ***********************
        $(document).on('click', '.viewStudentBtn', function() {
            var student_id = $(this).val();
            // alert(student_id);  // test

            // jqAjax
            $.ajax({
                type: "GET",
                url: "code.php?student_id=" + student_id,
                success: function(response) {

                    var res = jQuery.parseJSON(response);

                    if (res.status == 422) {
                        alert(res.message);

                    } else if (res.status == 200) {

                        //  val se koristi kada su input polja u pitanju!!!
                        // $('#view_name').val(res.data.name); 
                        // $('#view_email').val(res.data.email);
                        // $('#view_phone').val(res.data.phone);
                        // $('#view_course').val(res.data.course);

                        //  textse koristi za p tag
                        $('#view_name').text(res.data.name);
                        $('#view_email').text(res.data.email);
                        $('#view_phone').text(res.data.phone);
                        $('#view_course').text(res.data.course);

                        $("#studentViewModal").modal('show');

                    }

                }
            });
        });


        // ****************  Brisanje studenta  ***********************
        $(document).on('click', '.deleteStudentBtn', function(e) {

            e.preventDefault();
            if (confirm('Are you sure, you want to delete this data?')) {
                //  alert('I\'m in');

                var student_id = $(this).val();

                // jqAjax precica
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data: {
                        'delete_student': true,
                        'student_id': student_id

                    },

                    success: function(response) {

                        var res = jQuery.parseJSON(response);

                        if (res.status == 500) {
                            alert(res.message);
                        } else {
                            // alert(res.message);
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success(res.message);
                            $('#myTable').load(location.href + " #myTable"); // refresovanje tabele a ne cele strane
                        }

                    }
                });
            }



        });
    </script>


</body>

</html>