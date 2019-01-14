$(document).ready(function () {
    $('.figure').on('click', function () {
  
  
            $(this).css('display','none');
            $(this).removeClass('show').addClass('hide');
            $(this).siblings('.figure').css('display','block');
            $(this).siblings('.figure').removeClass('hide').addClass('show');
            var state = $(this).attr('class').split(' ')[0];
    
    
            var id = $(this).closest('.block').attr('class').split(' ')[0];
            var data = {'id' : id, 'etat' : state};
    
            $.post("../controllers/changementEtat.php", data,
                function (response) {
                }
            );
    });
  
    });

