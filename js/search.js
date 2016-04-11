$('#search').keyup(function()
	{
      var search_term=$(this).val();
      
      $.post('search.php', { search_term : search_term }, function(data){
      	//display results
        $('#search_results').html(data);
      });  
	});  