
 
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };


$(function(){
    $(".fold-table tr.view").on("click", function(){
      $(this).toggleClass("open").next(".fold").toggleClass("open");
    });


 
  });



  

$('#deleteModel').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
      
            var modal = $(this)
            modal.find('.modal-body #id').val(id);

   })


