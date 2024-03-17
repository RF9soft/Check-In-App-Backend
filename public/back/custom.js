$(document).ready(function(){
  
	$.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
   

   $('.dropify').dropify();

   $('.select2-single').select2();

   
   var base_url = localStorage.getItem('baseUrl');


   var currentURL = window.location.pathname;




  
   var ajax_url = '';

   
   //categories 

   var categoryTable = $('#category-table').DataTable({
   	    searching: true,
        processing: true,
        serverSide: true,
        ordering: false,
        responsive: true,
        stateSave: true,
        ajax: {
          url: base_url+"/categories", 
          data: function (d) {

                d.category_type = $("#filter_category_type").val(),
                
                d.status = $('#filter_category_status').val(),

                d.search = $('.dataTables_filter input').val()
            }
        },

        columns: [
            {data: 'category_name', name: 'category_name'},
            {data: 'category_type', name: 'category_type'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });


    $('.filter-category').click(function(){

        categoryTable.draw();
    });


    var checkinTable = $('#checkin-table').DataTable({
        searching: true,
        processing: true,
        serverSide: true,
        ordering: false,
        responsive: true,
        stateSave: true,
        ajax: {
          url: base_url+'/checkin-lists',   
 
        },

        columns: [
            {data: 'name', name: 'name'},
            {data: 'phone', name: 'phone'},
            {data: 'email', name: 'email'},
            {data: 'feelings_type', name: 'feelings_type'},
            {data: 'mood', name: 'mood'},
            {data: 'date', name: 'date'},
        ]
    });


    //notifications

      
      var notificationTable = $('#notification-table').DataTable({
        searching: true,
        processing: true,
        serverSide: true,
        ordering: false,
        stateSave: true,
        ajax: {
          url: base_url+"/notifications", 
        },

        columns: [
            {data: 'notification_title', name: 'notification_title'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });    


    //tips

    var tipTable = $('#user-table').DataTable({
        searching: true,
        processing: true,
        serverSide: true,
        ordering: false,
        responsive: true,
        stateSave: true,
        ajax: {
          url: base_url+"/user-lists", 
         data: function (d) {

                d.user_type = $("#filter_user_type").val(),
                d.search = $('.dataTables_filter input').val()

            }

        },

        columns: [
            {data: 'name', name: 'name'},
            {data: 'user_type', name: 'user_type'},
            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });


    $('#filter_user_type').change(function(){

        tipTable.draw();
    });






  $(document).on('click', '.delete-user', function(e){
       e.preventDefault();
       var int_user_id = $(this).data('id');
    
       if(confirm('Do you want to delete this?'))
       {
          ajax_url = base_url+"/delete-user/"+int_user_id;
            $.ajax({

                 url: ajax_url,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {
                    toastr.success(data);

                     $('.data-table').DataTable().ajax.reload(null, false);
     
                 },
                        
            });
       }
  });



   
});



