(function($){
    $(document).bind('ready',function(){
       $('.cms-grid-masonry').each(function(){
        $filter = $('#menu-w_leftmenu');
          if($filter){
            $filter.find('a').on('click',function(e){
              e.preventDefault();
              // set active class
              $filter.find('a').removeClass('active');
              $(this).addClass('active');
                   
              // get group name from clicked item
              var groupName = $(this).attr('data-group');
              // reshuffle grid
              $('.cms-grid-masonry').shuffle('shuffle', groupName );
            });
          }
       });  
    });
})(jQuery);