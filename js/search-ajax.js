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
            var data_json = $.parseJSON(data);
            var table_body_html = "";
            for(var i=0; i<data_json.length; i++) {
                table_body_html += "<tr>";

                // parsing name
                table_body_html += "<td>";
                table_body_html += data_json[i].lastname + ", " + data_json[i].firstname + " " + data_json[i].mi;
                table_body_html += "</td>";

                // parsing department
                table_body_html += "<td>";
                table_body_html += data_json[i].department;
                table_body_html += "</td>";

                // parsing mailstop
                table_body_html += "<td>";
                table_body_html += data_json[i].mailstop;
                table_body_html += "</td>";

                // parsing plus 4 zip
                table_body_html += "<td>";
                table_body_html += data_json[i].zip;
                table_body_html += "</td>";

                // parsing office
                table_body_html += "<td>";
                table_body_html += data_json[i].building;
                table_body_html += "</td>";

                // parsing phone
                table_body_html += "<td>";
                table_body_html += data_json[i].phone;
                table_body_html += "</td>";

                // parsing designation
                table_body_html += "<td>";
                if(data_json[i].is_fac == "Y") {
                    table_body_html += "Faculty";
                } else if(data_json[i].is_stf == "Y"){
                    table_body_html += "Staff";
                } else if (data_json[i].is_stu == "Y"){
                    table_body_html += "Student";
                }
                table_body_html += "</td>";

                table_body_html += "</tr>";
            }
            $("#results-table-body").html(table_body_html);
        });
    });
});