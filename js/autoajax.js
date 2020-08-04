function fetchdata() {
    $.ajax({
        url: 'server.php',
        type: 'get',
        dataType: 'JSON',
        success: function(response) {
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
    setInterval(fetchdata, 10000);
});