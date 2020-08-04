// function insertdata() {
$(document).ready(function() {
    $('#insert').validate({
        rules: {
            name: "required",
            email: { email: true, required: true },
            date: { required: true },
            message: { required: true },
        },
        messages: {
            name: "Please fill name",
            email: {
                email: "Enter Valid Email!",
                required: "Enter Email!"
            },
            date: {
                required: "Please enter date"
            },
            message: {
                required: "Please enter message"
            },
        },
        submitHandler: function(form) {
            $.ajax({
                url: "insert.php",
                method: "POST",
                data: $('#insert').serialize(),
                beforeSend: function() {
                    $('#submit').val("submit");
                },
                success: function(data) {
                    $('#insert')[0].reset();
                    $('#modalForm').modal('hide');
                }
            });
        }
    });
    // }

    // insertdata();
});