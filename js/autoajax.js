$(document).ready(function() {

});

function pagination(a) {
    $("#userTable tbody").load("server.php?page=1");
    $("#pagination li").on('click', function(e) {
        e.preventDefault();
        $("#pagination li").removeClass('active');
        $(this).addClass('active');
        var pageNum = this.id;
        console.log(pageNum);
        $("#userTable tbody").load("server.php?page=" + pageNum);
    });
    // console.log("hhh", a);
}

function fetchdata() {
    $.ajax({
        url: 'server.php',
        type: 'get',
        data: $('#userTable').serialize(),
        dataType: 'JSON',
        success: function(response, data) {
            console.log(response);
            var len = response.length;
            var tbodyHtml = '';
            for (var i = 0; i < len; i++) {
                var id = response[i].id;
                var name = response[i].name;
                var email = response[i].email;
                var message = response[i].message;
                var date = response[i].date;
                tbodyHtml += '<tr>' +
                    '<td>' + (i + 1) + '</td>' +
                    '<td>' + name + '</td>' +
                    '<td>' + email + '</td>' +
                    '<td>' + message + '</td>' +
                    '<td>' + date + '</td>' +
                    '</tr>';
            }
            $("#userTable tbody").html(tbodyHtml);
        }
    });
}

$(document).ready(function() {
    fetchdata()
    setInterval(fetchdata, 5000);
    pagination();
});