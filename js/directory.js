$(document).ready(function(){
    //Togglers for Drop Down Menus
    //Top Nav
    $('.toggle-nav').click(function(e) {
        $(this).toggleClass('top-nav');
        $('#main-navigation').toggleClass('top-nav');
    });
    //Quick Links
    $('.toggle-quickLinks').click(function(e) {
        $(this).toggleClass('quick-links');
        $('.quicklinks').toggleClass('right-menu-active');
    });

    
    //Change background-color onclick for tabLinks
    //$('.tabLinks li').click(function(e){
      //  $(this).addClass('white').siblings().removeClass('white');
     //   e.preventDefault();
    //});
    //TabLinks onclick to hide/show content
    //$('ul.tabLinks li').click(function(){
     //   var tab_link = $(this).attr('data-tab');

       // $('ul.tabLinks li').removeClass('active');
       // $('.tabContent').removeClass('active');

       // $(this).addClass('active');
      //  $('#'+tab_link).addClass('active');
    //});
    //Change background-color onclick for searchTab-nav
    //$('.searchTab-nav li').click(function(e){
      //  $(this).addClass('tabNav-white').siblings().removeClass('tabNav-white');
     //   e.preventDefault();
    //});
    //SearchTab-nav onclick to show/hide content
    //$('.searchTab-faculty').click(function(){
     //   $('.department').show();
    //});
    //$('.searchTab-all, .searchTab-students').click(function(){
     //   $('.department').hide();
    //});

    // pills logic
    //boostrap-pills (making sure the "active" class moves independently for each pill row)
    $('#boostrap-pills1 a').click(function() {
        $('#boostrap-pills1 a').removeClass('active');
        $(this).addClass('active');
    });
    $('#bootstrap-pills2 a').click(function() {
        $('#bootstrap-pills2 a').removeClass('active');
        $(this).addClass('active');
    });

    $('#faculty-staff-pill').click(function() {
        $('#select-dept-dropdown').removeClass('hidden');
    });

    $('#all-pill, #students-pill').click(function() {
        $('#select-dept-dropdown').addClass('hidden');
    });


    //search tab toggle
    $("#search-pill").click(function(){
        $("#update-information").addClass('hidden');
        $("#printed-directory").addClass('hidden');
        $("#retired-staff").addClass('hidden');

        $("#update-information").removeClass('active');
        $("#printed-directory").removeClass('active');
        $("#retired-staff").removeClass('active');

        $("#search").addClass('active');
    });

    //update information toggle
    $("#update-pill").click(function(){
        $("#search").addClass('hidden');
        $("#printed-directory").addClass('hidden');
        $("#retired-staff").addClass('hidden');

        $("#search").removeClass('active');
        $("#printed-directory").removeClass('active');
        $("#retired-staff").removeClass('active');

        $("#update-information").addClass('active');
    });

    //printed directory toggle
    $("#print-pill").click(function(){
        $("#search").addClass('hidden');
        $("#update-information").addClass('hidden');
        $("#retired-staff").addClass('hidden');

        $("#search").removeClass('active');
        $("#update-information").removeClass('active');
        $("#retired-staff").removeClass('active');

        $("#printed-directory").addClass('active');
    });

    //retired staff toggle
    $("#retired-pill").click(function(){
        $("#search").addClass('hidden');
        $("#update-information").addClass('hidden');
        $("#printed-directory").addClass('hidden');

        $("#search").removeClass('active');
        $("#update-information").removeClass('active');
        $("#printed-directory").removeClass('active');

        $("#retired-staff").addClass('active');
    });

   // department select logic
   //edited to support a select element instead of a dropdown button
   $('#select-department-content').change(function() {
    var selectBox = document.getElementById("select-department-content");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    
    $('#select-department-content').attr('value', selectedValue);
    });

    // displaying the results when the search button is clicked
    $('#search-btn').click(function() {
        $('.results-row').css('display', 'flex');
    });

    // creating the datatable
    $('#directory').DataTable();

   
});

function setMainDim(){
    //set body-wrapper for the directory's max-width to the same as logoTitle's width (so that the heading and the content inside of the page are 
    //the same width)
    var logoWidth = $(".logoTitle").css("max-width");
    //$(".body-wrapper").css("max-width", logoWidth);
    $(".container").css("max-width", logoWidth);

    //fix height of header that adds extra white space because of the Nav styling needing some extra space to place the text
    //using the actual height of top-nav + logo-section to get the height of the header to get rid of extra white space
    var topNavHeight = $(".top-nav").height();
    var logoSectionHeight = $(".logo-section").height();
    //+5 because the logoSection has a 5px top border
    var wrapperHeight = topNavHeight + logoSectionHeight + 5; 
    //console.log(topNavHeight + " +  " + logoSectionHeight);
    //console.log(wrapperHeight);

    $("header").css("height", wrapperHeight);
    

    //recalculates the  minimum height of main based on what is leftover from the header and footer in the window
    //fixes white space issue beneath footer
    var winHeight =  $(window).height();
    var headerHeight = $("header").height();
    var footerHeight = $("footer").height();
 
    var mainHeight = winHeight - headerHeight- footerHeight;
    $("main").css("min-height", mainHeight);

}
setMainDim();


//all things that it needs to keep in line when the window resizes 
$(window).resize(function(){
    setMainDim();
});

var randomBG = ["images/background/horizon1.jpg", "images/background/awcc1.jpg", "images/background/aroundCampus1.jpg"];
//0, 1, 2
var randomInt = Math.floor((Math.random() * 3) + 0);

document.getElementById("directory-background").src = randomBG[randomInt];

// Disable search and ordering by default
$.extend( $.fn.dataTable.defaults, {
    searching: false,
    ordering:  false
} );
