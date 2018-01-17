$(document).ready(function(){
    $("#search-btn").click(function(){
        var group = $("#bootstrap-pills li .active").attr("value");
        var department = "";
        if( $("#select-department-content").attr("value") != "Select a department" ){
            department = $("#select-department-content").attr("value");
        }
        var firstname = $("#first-name-search").val();
        var lastname = $("#last-name-search").val();
        var data = {
            group: group,
            department: department,
            firstname: firstname,
            lastname: lastname
        };
        $.post("search.php", data, function(data, status) {
            // for(var i=0; i<data.length; i++) {
            //     console.log("data: " + data[i]);
            // }
            console.log("Group: " + group + "\nDepartment: " + department + "\nFirstname: " + firstname + "\nLastname: " + lastname);
            console.log("\n" + data);
        });
    });
});