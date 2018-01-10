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
    $('.tabLinks li').click(function(e){
        $(this).addClass('white').siblings().removeClass('white');
        e.preventDefault();
    });
    //TabLinks onclick to hide/show content
    $('ul.tabLinks li').click(function(){
        var tab_link = $(this).attr('data-tab');

        $('ul.tabLinks li').removeClass('active');
        $('.tabContent').removeClass('active');

        $(this).addClass('active');
        $('#'+tab_link).addClass('active');
    });
    //Change background-color onclick for searchTab-nav
    $('.searchTab-nav li').click(function(e){
        $(this).addClass('tabNav-white').siblings().removeClass('tabNav-white');
        e.preventDefault();
    });
    //SearchTab-nav onclick to show/hide content
    $('.searchTab-faculty').click(function(){
        $('.department').show();
    });
    $('.searchTab-all, .searchTab-students').click(function(){
        $('.department').hide();
    });

    // pills logic
    $('.nav-pills a').click(function() {
        $('.nav-pills a').removeClass('active');
        $(this).addClass('active');
    });

    $('#faculty-staff-pill').click(function() {
        $('#select-dept-dropdown').removeClass('hidden');
    });

    $('#all-pill, #students-pill').click(function() {
        $('#select-dept-dropdown').addClass('hidden');
    });

    // dropdown logic
    $('.select-department').click(function() {
        let department = $(this).html().replace("&amp;", "&");
        $('#select-department-content').text(department);
        $('#select-department-content').attr('value', department);
    });

    // displaying the results when the search button is clicked
    $('#search-btn').click(function() {
        $('.results-row').css('display', 'flex');
    });

    // creating the datatable
    $('#directory').DataTable();
});