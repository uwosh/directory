$(document).ready(function() {
    $.ajax({
        url: "dept-load.php",
        success: function(data){
            departments = JSON.parse(data);

            htmlStr = "<option selected>Select a Department</option>";
            departments.forEach(function(department) {
                htmlStr += "<option class='select-department'>" + department + "</option>"
            });

            $("#select-department-content").html(htmlStr);
        }
    });
});